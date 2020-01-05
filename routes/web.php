<?php


Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('/', 'client\HomeController@index');

    Route::get('/application', 'client\HomeController@applicationPage');

    Route::get('/departments', 'client\HomeController@departments');

    Route::get('/departments/{department}/show', 'client\HomeController@showDepartment');

    Route::get('/services_providers/{provider}/details', 'client\ProviderController@details');

    Route::post('/services_providers/{provider}/rate', 'client\ProviderController@rate');

    Route::post('/services_providers/search', 'client\ProviderController@search');

    Route::get('/blog', function () {
        $current = 'blog';
        return view('client.blog', compact('current'));
    });

    Route::get('/post', function () {
        $current = 'blog';
        return view('client.post', compact('current'));
    });

    Route::get('/support', function () {
        $current = 'support';
        return view('client.support', compact('current'));
    });


});

