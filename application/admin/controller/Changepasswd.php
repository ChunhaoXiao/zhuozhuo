<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\validate\Password;
use app\common\model\Admin;
use think\facade\Session;

class Changepasswd extends Controller
{
    protected $middleware = [
        'AdminAuth'
    ];
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 更新密码
     *
     * 
     */
    public function update(Request $request)
    {
        $datas = $request->post();
        $res = $this->validate($datas, Password::class);
        if(true !== $res)
        {
            $this->error($res);
        }
        $admin_id = Session::get('admin_id','admin');
        $admin = Admin::get($admin_id);
        if(!password_verify($datas['old_password'], $admin['password']))
        {
            //return redirect('changepasswd/create')->with('error', '原密码不正确');
            $this->error('原密码不正确');
        }
        $admin->save(['password' => $datas['password']], ['id' => $admin_id]);
        return redirect('changepasswd/create')->with('success', '1');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
