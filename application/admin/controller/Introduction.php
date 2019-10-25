<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\traits\Upload;
use app\common\model\Introduction as model;

class Introduction extends Controller
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
    public function create(Request $request)
    {
        $data = model::where('type', $request->type)->find();
        return view('create', ['data' => $data]);
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
        $res = $this->validate($datas, 'app\admin\validate\Introduction');
        if($res !== true)
        {
            $this->error($res);
        }
        if(!empty($datas['pictures']))
        {
            $datas['pictures']  =  $this->upload('pictures');
        }
    
        if($intro = model::where('type', $datas['type'])->find()) 
        {
            if(empty($datas['pictures']))
            {
                unset($datas['pictures']);
            }

            $intro->save($datas, ['id' => $intro->id]);
            return redirect('create', ['type' => $datas['type']])->with('success', 1);
        }
        model::create($datas);
        return redirect('create', ['type' => $datas['type']])->with('success', 1);
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
