<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginRedirect
{
    /**
     * Handle an incoming request.
     * 判断是否登录，未登录直接跳转到登录页
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $member = $request->session()->get('member');
        if (!$member) {
            return redirect('/login');
        }
        return $next($request);
    }
}
