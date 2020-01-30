<?php

namespace App\Http\Middleware;

use Closure;

class ApiTranslation
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

        if($request->has('locale') && $request->has('locale') != '') {

            if(in_array($request->locale, ['ar', 'en'])) {

                app()->setLocale($request->locale);

            }

        }

        return $next($request);

    }
}
