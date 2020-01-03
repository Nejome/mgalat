<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class sdMiddleware
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

        if(Auth::user()->hasRole('superAdmin') || Auth::user()->hasPermissionTo('عرض بيانات وتحديد مواقع مزودي الخدمات')){

            return $next($request);

        }else {

            abort('401');

        }

        return $next($request);

    }
}
