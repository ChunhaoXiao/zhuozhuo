<?php

namespace app\admin\validate;

use think\Validate;

class Software extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'description' => 'require',
        'category_id' => 'require',
        'picture' => 'fileExt:png,jpg,jpeg'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'description.require' => '描述不能为空',
        'picture.fileExt' => '图片格式不允许'
    ];
}
