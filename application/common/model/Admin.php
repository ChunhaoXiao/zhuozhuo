<?php

namespace app\common\model;

use think\Model;

class Admin extends Model
{
    public function setPasswordAttr($v)
    {
    	return password_hash($v, PASSWORD_DEFAULT);
    }

    public function updateLastLogin()
    {
    	$this->last_login_ip = request()->ip();
    	$this->last_login_time = date('Y-m-d H:i:s', time());
    	$this->save();
    	//self::update();
    }
}
