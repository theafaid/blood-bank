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
