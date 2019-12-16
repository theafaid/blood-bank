<?php

if(! function_exists('site')) {
    function site($key = null) {
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
