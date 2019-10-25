<?php

namespace app\common\model;

use think\Model;

class Introduction extends Model
{
    protected $table = 'introductions';

    protected $type = [
    	'pictures' => 'array',
    ];

    public function scopeCompany($query)
    {
    	$query->where('type', 'company');
    }

    public function scopeTeam($query)
    {
    	$query->where('type', 'team');
    }

    public function getOutlineAttr($v, $data)
    {
    	return strlen($data['content']) > 150 ? mb_substr($data['content'], 0, 150).' ...' : $data['content'];
    }
}
