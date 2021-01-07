<?php

if (!function_exists('aurl')) {
    function aurl($url = null){
        return route('admin.' .$url);
    }// end aurl
}// end of if

if (!function_exists('admin')) {
    function admin(){
        return auth()->guard('admin');
    }
}// end of if