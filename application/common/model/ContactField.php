<?php

namespace app\common\model;

use think\Model;

class ContactField extends Model
{
    public function getFormElementAttr($v, $data)
    {
    	if(in_array($data['type'], ['text', 'email', 'number']))
    	{
    		$step = $data['type'] == 'number' ? 'step=0.00001' : '';
    		return "<input " .$step. " type='".$data['type']."' class='form-control'  name='".$data['name']."'>";
    	}

    	if($data['type'] == 'file')
    	{
    		return "<input type='file' class='form-file-control' name=".$data['name'].">";
    	}
    }
}
