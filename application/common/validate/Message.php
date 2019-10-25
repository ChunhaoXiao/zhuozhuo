<?php

namespace app\common\validate;

use think\Validate;

class Message extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'name' => 'require|max:10',
        'phone' => 'require|mobile',
        'email' => 'email',
        'content' => 'require|min:5|max:500',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require' => '请填写姓名',
        'name.max' => '姓名不能超过 10 个字',
        'phone' => '请填写手机号',
        'phone.mobile' => '手机号格式不正确',
        'email.email' => '邮箱地址格式不正确',
        'content.require' => '请填写留言内容',
        'content.min' => '留言内容不能少于5个字',
    ];
}
