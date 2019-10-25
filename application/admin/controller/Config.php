<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\traits\Upload;
use app\common\model\Config as configModel;
use think\facade\Cache;

class Config extends Controller
{
    protected $middleware = [
        'AdminAuth'
    ];
    use Upload;
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
        //dump(config('configoptions.'));
        $data = configModel::find();
        return view('create', ['data' => $data]);
    }

    /**
     * 保存配置参数
     *
     */
    public function save(Request $request)
    {
        $datas = $request->param(true);
        $config = configModel::find();
        
        foreach(config('configoptions.') as $field => $v)
        {
            if($v['type'] == 'file')
            {
                if(!empty($datas[$field]))
                {
                    $datas[$field] = $this->upload($field);
                }
                if(!empty($datas['old_'.$field])) //
                {
                    $datas[$field] = array_merge($datas[$field], $datas['old_'.$field]);
                }
                if($config && !empty($v['multiple']))
                {
                    $config->save([$field => ''], ['id' => $config->id]);
                }
                if($config && empty($v['multiple']) && empty($datas[$field]))
                {
                    unset($datas[$field]);
                }
            }
        }
        
        Cache::rm('config');
        if($config)
        {
            $config->save($datas, ['id' => $config->id]);
            return redirect('create')->with('success', 1);
        }
        configModel::create($datas);
        return redirect('create')->with('success', 1);
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
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
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
