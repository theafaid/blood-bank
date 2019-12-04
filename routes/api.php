<?php

Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::middleware('auth:api')->get('/user', function () {
    return request()->user();
});

/**
 * Auth Routes
 */

Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginController@login');
});
