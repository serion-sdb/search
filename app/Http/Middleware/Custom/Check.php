<?php

namespace App\Http\Middleware\Custom;

use Closure;

class Check
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
        //dd(auth()->user());
        //dd(\Auth::user());
        //dd(request()->user() == \Auth::user());
        //dd(\Auth::guard('sanctum')->user());
        //dd(\Auth::guard('api')->check());
        //dd(config('auth.guards'));
        /*
        \Auth::resolved(function($auth) {
            dd($auth);
        });
        */

        return $next($request);
    }
}
