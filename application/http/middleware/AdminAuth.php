<?php

namespace app\http\middleware;
use think\facade\Session;

class AdminAuth
{
    public function handle($request, \Closure $next)
    {
    	if(empty(Session::get('admin_id', 'admin')))
    	{
    		return redirect('admin/auth/showlogin');
    	}
    	return $next($request);
    }
}
