<?php

namespace app\http\middleware;
use think\facade\Cache;
use think\facade\Session;
class LimitFailedLogin
{
    public function handle($request, \Closure $next)
    {
    	$username = $request->username;
    	$ip = $request->ip();
    	$key  = $username.$ip;
    	if(Cache::get($key) > 5)
    	{
    		return redirect('auth/showlogin')->with('error', '登录失败次数太多了，请稍后再试');
    	}

    	return $next($request); 
    }
}
