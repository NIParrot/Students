<?php
namespace students;

use NI_route;

class students
{
    public static function index()
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['students','home'];
        $static = [
            'css_arr' => [],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'routes' => (new NI_route)->Routes()['get']
            
        ];
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function login(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['students','login'];
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
