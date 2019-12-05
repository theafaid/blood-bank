<?php

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', function() {
        return view('home');
    });
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
