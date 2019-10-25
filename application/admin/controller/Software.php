<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\common\model\Category;
use think\facade\View;
use app\common\model\Software as softwareModel;
use app\common\traits\Upload;


class Software extends Controller
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

    protected function initialize()
    {
        $features = Category::softcate()->select();
        View::share('features', $features);
    }

    public function index()
    {
        $datas = softwareModel::with('category')->select();
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
        $res = $this->validate($datas, 'app\admin\validate\Software');
        if($res !== true)
        {
            $this->error($res);
        }

        foreach(['picture', 'icon'] as $v)
        {
            if(!empty($datas[$v]))
            {
                $datas[$v] = $this->upload($v);
            }
        }
        $feature = Category::getOrFail($request->category_id);

        if($soft = $feature->software)
        {   
            if(empty($datas['picture']))
            {
                unset($datas['picture']);
            }
            if(empty($datas['icon']))
            {
                unset($datas['icon']);
            }
            
            $soft->save($datas, ['id' => $soft->id]);
            $this->success('操作成功', 'index');
        }
        $feature->software()->save($datas);
        $this->success('操作成功', 'index');
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
        $data = softwareModel::getOrFail($id);
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
        
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        softwareModel::destroy($id);
        return json(['status' => 'success']);
    }
}
