<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Contact as model;
use app\common\model\ContactField;
use app\common\traits\Upload;
use think\File;
class Contact extends Controller
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
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $fields = ContactField::order('order')->select();
        $contact = model::find();
        return view('create', ['datas' => $fields, 'contact' => $contact]);
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
        $contact = model::find();
        foreach($datas as $k => $v)
        {
            if($v instanceof File)
            {
                $datas[$k] = $this->upload($k);
            }
        }
        if($contact)
        {
            $contact->save($datas, ['id' => $contact->id]);
            return redirect('create')->with('success', 1);
        }
        $datas = array_filter($datas);
        if(empty($datas))
        {
            $this->error('数据不能为空');
        }
        model::create($datas);
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
