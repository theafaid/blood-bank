<?php


/**
 * Auth Routes
 */

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    Route::get('/me', 'MeController')->name('me');
    Route::post('/register', 'RegisterController');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout');
});
