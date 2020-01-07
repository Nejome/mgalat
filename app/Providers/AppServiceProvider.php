<?php

namespace App\Providers;

use App\Department;
use App\Specialty;
use App\Post;
use App\Provider;
use App\City;
use App\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->share('setting', Setting::find(1));
        view()->share('g_cities', City::all());
        view()->share('g_6_providers', Provider::latest()->limit(6)->get());
        view()->share('g_3_posts', Post::latest()->limit(3)->get());
        view()->share('g_departments_count', Department::all()->count());
        view()->share('g_specialties_count', Specialty::all()->count());
        view()->share('g_cities_count', City::all()->count());
        view()->share('g_providers_count', Provider::all()->count());

    }
}
