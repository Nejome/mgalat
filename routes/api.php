<?php

//********** Providers Routes **********//
Route::group(['prefix' => 'providers'], function () {

    Route::post('/login', 'api\providers\ProviderController@login');
    Route::post('/verify', 'api\providers\ProviderController@verify');
    Route::post('/register', 'api\providers\ProviderController@register');

    //********** Require authentication **********//
    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('logout', 'api\providers\ProviderController@logout');

        Route::post('/{provider}/update', 'api\providers\ProviderController@update');

    });

});

//********** Users Routes **********//

//********** Public Routes **********//
