<?php

namespace app\common\model;

use think\Model;

class News extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter($query, $data)
    {
    	if(!empty($data) && is_array($data))
    	{
    		foreach($data as $k => $v)
    		{
    			if(strlen($v))
    			{
    				if(in_array($k, ['title', 'content', 'category']))
	    			{
	    				if($k == 'category')
	    				{
	    					$query->where('category_id', $v);
	    				}
	    				else
	    				{
	    					$query->where($k, 'like', '%'.$v.'%');
	    				}
	    			}
    			}
    		}
    	}
    }

    public function getSummeryAttr($v, $data)
    {
        return mb_substr(strip_tags($data['content']), 0, 40);
    }

    public function scopeTop($query)
    {
        $query->order('create_time desc')->limit(5);
    }

    public function getPrevAttr($v, $data)
    {
        $prev = self::where('id', '<', $data['id'])->order('id desc')->find();
        if($prev)
        {
            return '<div>上一篇：'.'<a class=text-secondary href='.url('index/news/read', ['id' => $prev->id]).'>'.$prev->title.'</a></div>';
        }
        return '';
    }

    public function getNextAttr($v, $data)
    {
        $next = self::where('id', '>', $data['id'])->order('id')->find();
        if($next)
        {
            return '<div>下一篇：'.'<a class=text-secondary href='.url('index/news/read', ['id' => $next->id]).'>'.$next->title.'</a></div>';
        }
        return '';
    }
    // public function setContentAttr($v)
    // {
    //     return strip_tags($v);
    // }
}
