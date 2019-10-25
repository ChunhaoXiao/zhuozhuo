<?php

namespace app\http\middleware;
use app\common\model\News;
use think\facade\Session;
class IncNewsViews
{
    public function handle($request, \Closure $next)
    {
    	$id = $request->id;

    	$news = News::get($id);
        //Session::clear();
    	if($news)
    	{
    		$viewed = session('newsid');
    		$viewed = empty($viewed)? [] : unserialize($viewed);
    		if(!in_array($id, $viewed))
    		{
    			$viewed[] = $id;
    			session('newsid', serialize($viewed));
    			$news->save(['view_count' => $news->view_count + 1], ['id' => $id]);
    		}
    	}
    	return $next($request);
    }
}
