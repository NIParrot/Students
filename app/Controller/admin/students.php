<?php

namespace admin;

class students
{
    public static function register(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','students','register'];
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

    public static function PostRegister()
    {
        $validate = [
            'name'=>'string',
            'user'=>'string',
            'password'=>'string',
            'phone'=>'string',
            'groups_id'=>'id',
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\students::create($RequestData);
        if (!empty($dash)) {
            
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'],'danger','Error in username or password[×_×]!');
        }
    }
}
