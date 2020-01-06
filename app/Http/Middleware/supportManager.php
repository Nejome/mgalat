<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class supportManager
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

        if(Auth::user()->hasRole('superAdmin') || Auth::user()->hasPermissionTo('الدعم الفني')){

            return $next($request);

        }else {

            abort('401');

        }

        return $next($request);

    }
}
