<?php

namespace App\Http\Middleware;

use Closure;

class AcceptHeader
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
        //调用默认返回json格式
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}