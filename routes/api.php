<?php

Route::middleware('auth:api')->get('/user', function () {
    return request()->user();
});
