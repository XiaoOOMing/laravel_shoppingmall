<?php

namespace App\Http\Middleware;

use App\Logics\Show;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $member = $request->session()->get('member');
        if (!$member) {
            return exit(Show::show(0, 'please login'));
        }
        return $next($request);
    }
}
