<?php

//**********Session Routes**********//

Route::get('/', 'admin\SessionsController@login_page')->name('login');
Route::post('/login', 'admin\SessionsController@login');


Route::middleware('auth')->group(function() {

    Route::get('/home', 'admin\HomeController@index');
    Route::get('/logout', 'admin\SessionsController@logout');

    //**********Users Routes**********//
    Route::get('/profile', 'admin\UsersControllers@profile');
    Route::post('/profile', 'admin\UsersControllers@updateProfile');


    //********* superAdmin **********//
    Route::middleware('superAdmin')->group(function() {

        //**********Users Routes | By superAdmin Only**********//
        Route::get('/users', 'admin\UsersControllers@index');
        Route::get('/users/create', 'admin\UsersControllers@create');
        Route::post('/users/store', 'admin\UsersControllers@store');
        Route::get('/users/{user}/edit', 'admin\UsersControllers@edit');
        Route::post('/users/{user}/update', 'admin\UsersControllers@update');
        Route::get('/users/{user}/delete', 'admin\UsersControllers@delete');

        //**********Permission Routes**********//
        Route::get('dev/permissions', 'admin\PermissionController@index');
        Route::post('dev/permissions/store', 'admin\PermissionController@store');
        Route::get('dev/permissions/{id}/edit', 'admin\PermissionController@edit');
        Route::post('dev/permissions/{id}/update', 'admin\PermissionController@update');
        Route::get('dev/permissions/{id}/delete', 'admin\PermissionController@destroy');

        //**********Roles Routes**********//
        Route::get('dev/roles', 'admin\RoleController@index');
        Route::post('dev/roles/store', 'admin\RoleController@store');
        Route::get('dev/roles/{id}/edit', 'admin\RoleController@edit');
        Route::post('dev/roles/{id}/update', 'admin\RoleController@update');
        Route::get('dev/roles/{id}/delete', 'admin\RoleController@destroy');

        //**********Settings Routes**********//
        Route::get('settings', 'admin\SettingController@index');
        Route::post('settings/updateSystem', 'admin\SettingController@updateSystem');
        Route::post('settings/updateContact', 'admin\SettingController@updateContact');
        Route::post('settings/updateApplication', 'admin\SettingController@updateApplication');
        Route::post('settings/applicationImage/store', 'admin\ApplicationImageController@store');
        Route::get('settings/applicationImage/{image}/delete', 'admin\ApplicationImageController@delete');
        Route::get('settings/applicationRates', 'admin\ApplicationRateController@index');
        Route::get('settings/applicationRates/{rate}/delete', 'admin\ApplicationRateController@delete');

        //**********Providers Routes**********//
        Route::get('/providers/create', 'admin\ProviderController@create');
        Route::post('/providers/store', 'admin\ProviderController@store');
        Route::get('/providers/{provider}/contact', 'admin\ProviderController@contact');
        Route::post('/providers/{provider}/updateContact', 'admin\ProviderController@updateContact');
        Route::get('/providers/{provider}/edit', 'admin\ProviderController@edit');
        Route::post('/providers/{provider}/update', 'admin\ProviderController@update');
        Route::get('/providers/{provider}/delete', 'admin\ProviderController@delete');

        //**********Working Days Routes**********//
        Route::get('/providers/{provider}/working_days', 'admin\WorkingDaysController@index');
        Route::post('/providers/{provider}/update_working_days', 'admin\WorkingDaysController@update');

        //**********Provider Images Routes**********//
        Route::get('/providers/{provider}/images', 'admin\ProviderImageController@index');
        Route::post('/providers/{provider}/store_image', 'admin\ProviderImageController@store_image');
        Route::get('/providers/{image}/delete_image', 'admin\ProviderImageController@delete_image');

    });

    Route::middleware('dscManager')->group(function() {

        //**********Departments Routes**********//
        Route::get('departments', 'admin\DepartmentController@index');
        Route::get('departments/create', 'admin\DepartmentController@create');
        Route::post('departments/store', 'admin\DepartmentController@store');
        Route::get('departments/{department}/edit', 'admin\DepartmentController@edit');
        Route::post('departments/{department}/update', 'admin\DepartmentController@update');
        Route::get('departments/{department}/delete', 'admin\DepartmentController@delete');

        //**********Specialties Routes**********//
        Route::get('specialties', 'admin\SpecialtyController@index');
        Route::get('specialties/create', 'admin\SpecialtyController@create');
        Route::post('specialties/store', 'admin\SpecialtyController@store');
        Route::get('specialties/{specialty}/edit', 'admin\SpecialtyController@edit');
        Route::post('specialties/{specialty}/update', 'admin\SpecialtyController@update');
        Route::get('specialties/{specialty}/delete', 'admin\SpecialtyController@delete');

        //**********Countries Routes**********//
        Route::get('countries', 'admin\CountryController@index');
        Route::get('countries/create', 'admin\CountryController@create');
        Route::post('countries/store', 'admin\CountryController@store');
        Route::get('countries/{country}/edit', 'admin\CountryController@edit');
        Route::post('countries/{country}/update', 'admin\CountryController@update');
        Route::get('countries/{country}/delete', 'admin\CountryController@delete');

    });

    Route::middleware('mprManager')->group(function() {

        Route::get('providers', 'admin\ProviderController@index');
        Route::get('providers/{provider}/show', 'admin\ProviderController@show');

    });

    Route::middleware('ardManager')->group(function() {

        Route::get('providers/{provider}/active', 'admin\ProviderController@active');
        Route::get('providers/{provider}/disable', 'admin\ProviderController@disable');

    });

    Route::middleware('sdManager')->group(function() {

        Route::get('providers/{provider}/location', 'admin\ProviderController@location');
        Route::post('providers/{provider}/updateLocation', 'admin\ProviderController@updateLocation');
        Route::get('providers/{provider}/rates', 'admin\ProviderController@rates');
        Route::get('providers/rates/{rate}/delete', 'admin\ProviderController@deleteRate');

    });

    Route::middleware('blogManager')->group(function() {

        //**********Posts Routes**********//
        Route::get('posts', 'admin\PostController@index');
        Route::get('posts/create', 'admin\PostController@create');
        Route::post('posts/store', 'admin\PostController@store');
        Route::get('posts/{post}/edit', 'admin\PostController@edit');
        Route::get('posts/{post}/comments', 'admin\PostController@comments');
        Route::get('posts/comments/{comment}/delete', 'admin\PostController@deleteComment');
        Route::post('posts/{post}/update', 'admin\PostController@update');
        Route::get('posts/{post}/delete', 'admin\PostController@delete');

    });

    Route::middleware('supportManager')->group(function() {

        //**********Support Routes**********//
        Route::get('support', 'admin\SupportController@index');
        Route::get('support/{support}/show', 'admin\SupportController@show');
        Route::get('support/{support}/delete', 'admin\SupportController@delete');
        Route::get('messages', 'admin\MessageController@index');
        Route::post('messages/sendMessage', 'admin\MessageController@sendMessage');
        Route::get('messages/getProviders', 'admin\MessageController@getProviders');

    });

});
