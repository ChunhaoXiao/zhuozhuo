<?php 
namespace app\common\traits;
//use think\Upload as UploadFile;
trait upload {
	public function upload($name, $rule = [])
	{
		$file = request()->file($name);
		$rule = $rule?? ['ext' => 'jpg,jpeg,png', 'size' => 2000000];

		if(!empty($file))
		{
			if(is_array($file))
			{
				foreach($file as $f)
				{
					$info = $f->validate($rule)->move('./uploads');
					if(!$info)
					{
						$this->error($f->getError());
					}
					$res[] = $info->getSaveName();
				}
				return $res;
			}

			$info = $file->validate($rule)->move('./uploads');
			if(!$info)
			{
				$this->error($file->getError());
			}
			return $info->getSaveName();
		}
		return [];
	}
}