<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\validate\Navigator as Validator;
use app\common\model\Navigator as model;
use app\common\traits\Upload;
class Navigator extends Controller
{
    use Upload;

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
        $datas = model::order('order')->select();
        return view('index', ['datas' => $datas]);
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
        $datas = $request->param(true);
        $res = $this->validate($datas, Validator::class);
        if($res !== true)
        {
            $this->error($res);
        }
        if(!empty($datas['banner']))
        {
            $datas['banner'] = $this->upload('banner');
        }
        model::create($datas);
        $this->success('添加成功', 'index');
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
        $data = model::getOrFail($id);
        return view('create', ['data' => $data]);
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
        $row = model::getOrFail($id);
        $datas = $request->param(true);
        $res = $this->validate($datas, Validator::class);
        if($res !== true)
        {
            $this->error($res);
        }
        if(!empty($datas['banner']))
        {
            $datas['banner'] = $this->upload('banner');
        }
        else
        {
            unset($datas['banner']);
        }
        $row->save($datas, ['id' => $row->id]);
        $this->success('修改成功', 'index');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        model::destroy($id);
        return json(['status' => 1]);
    }
}
