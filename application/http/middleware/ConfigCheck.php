<?php

namespace app\http\middleware;
use think\facade\Cache;
use think\facade\View;
use app\common\model\Config;
use app\common\model\Navigator;
use app\common\util\CacheService;

class ConfigCheck
{
    public function handle($request, \Closure $next)
    {
    	if($request->module() == 'index')
    	{
    		// $config = Cache::get('config');
	    	// if(empty($config))
	    	// {
	    	// 	$config = Config::find();
	    	// 	Cache::set('config', $config);
	    	// }
	    	// $index = array_rand($config->banner);
	    	// $config['bannerbg'] = str_replace('\\', '/', $config->banner[$index]);

	    	// // if(empty($config->enabled))
	    	// // {
	    	// // 	exit('已关闭访问');
	    	// // }
	    	// View::share('config', $config);
	    	// $nav = Cache::get('nav');
	    	// if(empty($nav))
	    	// {
	    	// 	$nav = Navigator::order('order')->select();
	    	// 	Cache::set('nav', $nav);
	    	// }

	    	// View::share('navs', $nav);
	    	// $contact = Cache::get('contact');
	    	// if(empty($contact))
	    	// {
	    	// 	Cache::set('contact', $contact);
	    	// }
	    	CacheService::setCache();
    	}
    	
    	return $next($request);
    }
}
