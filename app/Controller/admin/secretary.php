<?php

namespace admin;

class secretary
{
    public static function register(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','secretary','register'];
        $static = [
            'css_arr' => [],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            
        ];
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }
}
