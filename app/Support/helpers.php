<?php

if(! function_exists('settings')) {
    function settings($key = null) {
        $settings = app('settings');

        if($key) {
            return isset($settings[$key]) ? $settings[$key] : null;
        }

        return $settings;
    }
}

if(! function_exists('apiUrl')) {
    function apiUrl($url = null) {
        return "/api/v1/" . $url;
    }
}
