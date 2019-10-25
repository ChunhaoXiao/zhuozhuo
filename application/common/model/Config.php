<?php

namespace app\common\model;

use think\Model;

class Config extends Model
{
    protected $type = [
    	'banner' => 'array',
    ];

    public function getPageTitleAttr($v, $data)
    {
    	$navs = cache('nav');

    	if(!empty($navs))
    	{
    		foreach($navs as $v)
    	    {
    	    	$key = explode('/', $v['link'])[0];
    	    	$pages[$key] = $v['name'];
    	    }
    	    //dump($pages);
    	    $controller = strtolower(request()->controller());
    	    return $pages[$controller];
    	}
    	return '';
    }

    public function getBreadAttr($v, $data)
    {
    	$navs = cache('nav');

 		$bread[] = [
 			'name' => '首页',
 			'link' => url('index/index/index'),
 		];

    	if(!empty($navs))
    	{
    		foreach($navs as $v)
    	    {
    	    	$key = explode('/', $v['link'])[0];
    	    	$pages[$key] = $v; 
    	    }

    	    $controller = strtolower(request()->controller());
    	    if($controller !== 'index')
    	    {
    	    	$bread[] = [
    	    		'name' => $pages[$controller]['name'],
    	    		'link' => url('index/'.$pages[$controller]['link']),
    	    	];
    	    }

    	   // return $pages[$controller];
    	}
    	return $bread;
    }
}
