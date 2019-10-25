<?php

namespace app\common\model;

use think\Model;
use think\facade\Cache;

class Navigator extends Model
{
    public static function init()
    {
        self::event('after_write', function ($model) {
            Cache::rm('nav');
            Cache::rm('banner');
        });
    }

    public function getControllerAttr($v, $data)
    {
    	return explode('/', $data['link'])[0];
    }
}
