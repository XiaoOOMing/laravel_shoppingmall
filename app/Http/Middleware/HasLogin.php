<?php

namespace App\Http\Middleware;

use Closure;

class HasLogin
{
    /**
     * Handle an incoming request.
     * 如果登录了，就无法进入的页面（登录 注册页）
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $member = $request->session()->get('member');
        if ($member) {
            return redirect('/');
        }

        return $next($request);
    }
}
