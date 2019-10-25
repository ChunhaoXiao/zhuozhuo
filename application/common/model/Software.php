<?php

namespace app\common\model;

use think\Model;

class Software extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    //上一个
    public function getPrevAttr($v, $data)
    {
    	return self::where('id', '<', $data['id'])->find();
    }

    //下一个
    public function getNextAttr($v, $data)
    {
    	return self::where('id', '>', $data['id'])->find();
    }



    // public function scopeLove($query)
    // {
    	
    // }
}