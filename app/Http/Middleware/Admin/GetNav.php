<?php

namespace App\Http\Middleware\Admin;

use Closure;
use App\Handlers\Level;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class GetNav
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //导航(获取角色对应的菜单)
        $navs = Auth::user()->getNavs();
        $level = new Level;
        $navs = $level->formatMulti($navs);
        View()->share(['navs' => $navs]);
        
        return $next($request);
    }
}