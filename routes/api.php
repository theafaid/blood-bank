<?php

/**
 * Auth Routes
 */

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('/me', 'MeController')->name('me');
    Route::post('/register', 'RegisterController');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
    Route::group(['prefix' => 'password'], function () {
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });
});

/**
 * Governorates & Cities
 */

Route::group(['prefix' => 'governorates', 'namespace' => 'Governorates'], function () {
    Route::get('/', 'GovernorateController');
    Route::get('/{governorate}/cities', 'GovernorateCitiesController@index');
});

/**
 * Blood types
 */
Route::group(['prefix' => 'blood-types', 'namespace' => 'BloodTypes'], function () {
    Route::get('/', 'BloodTypeController');
});


/**
 * Site settings
 */
Route::group(['prefix' => 'site-settings', 'namespace' => 'SiteSettings'], function () {
    Route::get('/', 'SiteSettingController');
});


/**
 * Contacts
 */
Route::group(['prefix' => 'contacts'], function () {
    Route::post('/', 'Contacts\ContactController');
});


/**
 * Categories & Posts
 */

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'Categories\CategoryController');
    Route::get('/{category}/posts', 'Categories\CategoryPostsController@index');
    Route::get('/{category}/posts/{post}', 'Categories\CategoryPostsController@show');
});

