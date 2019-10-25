<?php

namespace app\http\middleware;
use app\common\model\Message;
//use Carbon\Carbon;

class MessageLimit
{
	//限制留言频率 默认某个 IP 地址 200 秒之内只能留言一次
    public function handle($request, \Closure $next)
    {
    	$ip = $request->ip();
    	$message = Message::where('ip', $ip)->order('create_time desc')->find();
    	if($message)
    	{
    		$lastTime = $message->create_time;
    		if(time() - strtotime($lastTime) < 200)
    		{
    			return json(['status' => 1, 'message' => '你的留言太频繁了，请稍后再试']);
    		}
    	}
    	return $next($request);
    }
}
