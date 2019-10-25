<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
    public function software()
    {
    	return $this->hasOne(Software::class, 'category_id');
    }

    public function news()
    {
    	return $this->hasMany(News::class, 'category_id');
    }

    public function scopeSoftcate($query)
    {
    	$query->where('type', 'software');
    }

    public function scopeNewscate($query)
    {
    	$query->where('type', 'news');
    }
}
