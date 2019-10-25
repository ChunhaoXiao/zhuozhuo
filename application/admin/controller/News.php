<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\facade\View;
use app\common\model\News as newsModel;
use app\common\model\Category;

class News extends Controller
{

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
        $cates = Category::newscate()->select();
        View::share('cates', $cates);
    }

    public function index(Request $request)
    {
        $category = $request->category;
        $datas = newsModel::filter($request->param())->with('category')->order('id desc')->paginate(10);
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
        $data = $request->post();
        $res = $this->validate($data, 'app\admin\validate\News');
        if($res !== true)
        {
            $this->error($res);
        }
        newsModel::create($data);
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
        $news = newsModel::getOrFail($id);
        return view('create', ['data' => $news]);
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
        $data = $request->post();
        $res = $this->validate($data, 'app\admin\validate\News');
        if($res !== true)
        {
            $this->error($res);
        }
        $news = newsModel::getOrFail($id);
        $news->save($data, ['id' => $id]);
        $this->success('更新成功', 'index');
    }   

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        newsModel::destroy($id);
        return json(['status' => 'success']);
    }
}
