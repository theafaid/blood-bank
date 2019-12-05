<?php


Route::get('test', function() {
    return \App\Models\Client::find(1)->favouritedPosts;
});
