<?php


Route::group(['prefix' => LaravelLocalization::setLocale()], function() {

    Route::get('/', 'client\HomeController@index');

    Route::get('/application', 'client\HomeController@applicationPage');

    Route::get('/departments', 'client\HomeController@departments');

    Route::get('/departments/{department}/show', 'client\HomeController@showDepartment');

    Route::get('/services_providers/{provider}/details', 'client\ProviderController@details');

    Route::post('/services_providers/{provider}/rate', 'client\ProviderController@rate');

    Route::post('/services_providers/search', 'client\ProviderController@search');

    Route::get('/blog', 'client\PostController@index');

    Route::get('/blog/posts/{post}/show', 'client\PostController@show');

    Route::post('/blog/posts/{post}/comment', 'client\PostController@comment');

    Route::get('/support', 'client\SupportController@index');

    Route::post('/support/send', 'client\SupportController@store');

    Route::get('/support/start-chat', 'client\SupportController@startChat');

    Route::post('/support/start-chat', 'client\SupportController@createRoom');

    Route::get('/support/{token}/getChatMessages', 'client\SupportController@getChatMessages');

    Route::get('/support/{token}/chat', 'client\SupportController@chat');

    Route::get('/about_us', 'client\HomeController@about_us');

});

