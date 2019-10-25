<?php

namespace app\common\model;

use think\Model;

class Message extends Model
{
    public static function  init()
    {
    	self::event('before_write', function($model){
    		$model->ip = request()->ip();
    	});
    }
}
