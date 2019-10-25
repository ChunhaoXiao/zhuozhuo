<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\common\model\Category;
use think\facade\View;
use app\common\model\News as model;

class News extends Controller
{
    protected $middleware = [ 
        
        'IncNewsViews' => ['only' => ['read'] ],
    ];

    protected function initialize()
    {
        $categories = Category::newscate()->select();
        View::share('categories', $categories);

    }

    public function index(Request $request)
    {
        $category_id = $request->category??Category::newscate()->order('id')->value('id');
        $category = Category::getOrFail($category_id);
        $datas = $category->news()->order('create_time desc')->paginate(5);
        return view('index', [
            'datas' => $datas, 
            'category_id' => $category_id,
            'extra_bread' => [
                [
                    'name' => $category->name,
                    'link' => url('news/index', ['category' => $category_id])
                ]
            ]
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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
        $data = model::with('category')->getOrFail($id);
        return view('read', [
            'data' => $data, 
            //'bread_nav' => '新闻资讯>>'.$data->category->name.'>>'.$data->title
            'extra_bread' => [
                [
                    'name' => $data->category->name,
                    'link' => url('news/index',['category' => $data->category_id]),
                ],

                [
                    'name' => $data->title,
                    'link' => url('news/read', ['id' => $data->id]),
                ]
            ]
        ]);
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
