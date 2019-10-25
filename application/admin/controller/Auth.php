<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\facade\Session;
use app\admin\validate\Admin as Validator;
use app\common\model\Admin;
use think\facade\Cache;

class Auth extends Controller
{

    //检查短时间内（三分钟）连续登陆失败次数
    protected $middleware = [
        'LimitFailedLogin' => [
            'only' => ['login']
        ],
    ];

    //展示登录表单
    public function showLogin()
    {
        return view('login');
    }

    //登录操作(验证、设置session)
    public function login(Request $request)
    {
        $datas = $request->post();
        $res = $this->validate($datas, Validator::class);
        if($res !== true)
        {
            return redirect('auth/showlogin')->with('error', $res);
        }
        
        $user = Admin::where('username', $datas['username'])->find();
        if(!$user || !password_verify($datas['password'], $user->password))
        {
            $key = $datas['username'].$request->ip();
            Cache::get($key) ? Cache::inc($key) : Cache::set($key,1,180);
            return redirect('auth/showlogin')->with('error', '用户名或密码错误');
        }
        Session::set('admin_id', $user->id, 'admin');
        Session::set('admin_name', $user->username, 'admin');
        if(!empty($key))
        {
            Cache::delete($key);
        }
        $user->updateLastLogin();
        $this->success('登录成功', 'index/index');
    }

    //注销登录
    public function logout()
    {
        Session::delete('admin_id', 'admin');
        Session::delete('admin_name', 'admin');
        return redirect('index/index');
    }
}
