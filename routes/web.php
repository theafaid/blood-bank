<?php

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('/governorates', 'Governorates\GovernorateController');
});

//Route::get('test', function() {
//    // city >> governorate >> blood type
//
//    $clients = \App\Models\Governorate::find(4)->notifiedClients;
//
//    $users = array_intersect([1,2,4], [1, 2,3]);
//
//    $data = array_intersect(\App\Models\Governorate::find(4)->notifiedClients->pluck('id')->toArray(), \App\Models\BloodType::find(1)->notifiedClients->pluck('id')->toArray());
//
//    dd(\App\Models\Client::whereIn('id', $data)->get());
//
//    foreach($clients as $client) {
//    }
//});
