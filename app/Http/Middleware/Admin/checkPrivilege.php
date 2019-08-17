<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Auth;

class checkPrivilege
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
        if(!Auth::user()->hasRight()){
            return redirect()->back()->with('error', '你的权限不足');
        }
        return $next($request);
    }
}
