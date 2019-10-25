<?php 
namespace app\common\util;
use app\common\model\Contact;
use app\common\model\Navigator;
use app\common\model\Config;
use think\facade\Cache;
use think\facade\View;

class CacheService {
	public static function setCache()
	{
		//缓存配置数据
		$config = Cache::get('config');
		if(empty($config))
		{
			$config = Config::find();
			Cache::set('config', $config);
		}
		if(!empty($config))
		{
		    $config['softbg'] = str_replace('\\', '/', $config->soft_background);
		}
		View::share('config', $config);

		//缓存导航数据
		$nav = Cache::get('nav');
		if(empty($nav))
		{
			$nav = Navigator::order('order')->select();
			Cache::set('nav', $nav);
		}

		//缓存banner
		if(!empty($nav))
		{
			$banners = Cache::get('banners');
			if(empty($banners))
			{
				foreach($nav as $v)
				{
					$row[$v->controller] = $v->banner;
				}
				Cache::set('banner', $row);
			}
		}
		View::share('navs', $nav);

		//缓存联系方式数据
		$contact = Cache::get('contact');
		if(empty($contact))
		{
			$contact = Contact::find();
			Cache::set('contact', $contact);
		}
	}
}