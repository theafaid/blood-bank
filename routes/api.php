<?php


/**
 * Auth Routes
 */

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('/me', 'MeController')->name('me');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
    Route::post('/register', 'RegisterController@register');
});
