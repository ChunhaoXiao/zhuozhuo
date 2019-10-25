<?php

namespace app\common\model;

use think\Model;
use think\facade\Cache;

class Contact extends Model
{
    public static function init()
    {
        self::event('after_write', function ($model) {
            Cache::rm('contact');
        });
    }
}
