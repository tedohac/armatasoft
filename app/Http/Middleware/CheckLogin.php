<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Closure;

class CheckLogin
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
        if (Auth::check()) return $next($request);
        else return abort(403, 'Unauthorized');
    }
}
