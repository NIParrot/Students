<?php

namespace admin;

class absent
{
    public static function index(): void
    {
        //NI_security::unauthorized('adminkey',true,'/dashboard');
        // \NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','absent','home'];
        $static = [
            'css_arr' => [],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            
        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function PostAdd()
    {
        $validate = [
            'absent_date'=>'date',
            'groups_id'=>'int',
            'students_id'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\absent::create($RequestData);
        if (!empty($dash)) {
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }
}
