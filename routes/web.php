<?php

use App\Setting;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::get('/', function () {
        $current = 'home';
        return view('client.index', compact('current'));
    });

    Route::get('/welcome', function () {
        $current = 'welcome';
        return view('client.welcome', compact('current'));
    });

    Route::get('/verification-code', function () {
        $current = 'welcome';
        return view('client.verification-code', compact('current'));
    });

    Route::get('/support', function () {
        $current = 'support';
        return view('client.support', compact('current'));
    });

    Route::get('/application', 'client\HomeController@applicationPage');

    Route::get('/services', 'client\HomeController@services');

    Route::get('/search-result', function () {
        $current = 'services';
        return view('client.search-result', compact('current'));
    });

    Route::get('/blog', function () {
        $current = 'blog';
        return view('client.blog', compact('current'));
    });

    Route::get('/post', function () {
        $current = 'blog';
        return view('client.post', compact('current'));
    });

    Route::get('/provider', function () {
        $current = 'services';
        return view('client.provider', compact('current'));
    });

});

