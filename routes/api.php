<?php

//********** Providers Routes **********//
Route::group(['prefix' => 'providers'], function () {

    Route::post('/login', 'api\providers\ProviderController@login');
    Route::post('/verify', 'api\providers\ProviderController@verify');
    Route::post('/register', 'api\providers\ProviderController@register');

    Route::get('/{provider}/ProviderProfile', 'api\providers\ProviderController@ProviderProfile');

    Route::get('/{provider}/getWorkingDays', 'api\providers\ProviderDataController@getWorkingDays');

    Route::get('/{provider}/getImages', 'api\providers\ProviderDataController@getImages');

    Route::get('/{provider}/getLocation', 'api\providers\ProviderDataController@getLocation');

    Route::get('/{provider}/getTotalRate', 'api\providers\ProviderDataController@getTotalRate');

    Route::get('/{provider}/getRates', 'api\providers\ProviderDataController@getRates');

    Route::post('/{provider}/rateProvider', 'api\providers\ProviderDataController@rateProvider');

    //********** Require authentication **********//
    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('logout', 'api\providers\ProviderController@logout');

        Route::post('/{provider}/update', 'api\providers\ProviderController@update');

        Route::post('/{provider}/updateContact', 'api\providers\ProviderController@updateContact');

        Route::post('/{provider}/updateWorkingDays', 'api\providers\ProviderDataController@updateWorkingDays');

        Route::post('/{provider}/addImage', 'api\providers\ProviderDataController@addImage');

        Route::get('/images/{image}/delete', 'api\providers\ProviderDataController@deleteImage');

        Route::post('/{provider}/updateLocation', 'api\providers\ProviderDataController@updateLocation');

    });

});

//********** Users Routes **********//

//********** Public Routes **********//
