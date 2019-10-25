<?php

namespace app\admin\validate;

use think\Validate;

class Password extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'old_password' => 'require',
        'password' => 'require|min:6|max:16|confirm',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'old_password.require' => '原密码不能为空',
        'password.require' => '新密码不能为空',
        'password.min' => '密码长度最少6位',
        'password.max' => '密码长度最大16位',
        'password.confirm' => '两次密码不一致',
    ];
}
