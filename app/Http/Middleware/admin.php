<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class admin
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
        if (Auth::user()->permission == 0) {
            return $next($request);
        } else {
            abort(403, 'PAGE FOR ADMIN');
        }
    }
}
