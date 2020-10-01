<?php

namespace admin;

class admin
{
    public static function index()
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','home'];
        $static = [
            'css_arr' => ['style2'],
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

    public static function login()
    {
        \NI_security::unauthorized('role', 'student', '/');
        \NI_security::unauthorized('role', 'admin', '/admin');
        \NI_security::unauthorized('role', 'secretary', '/secretary');
        $path = ['admin','login'];
        $static = [
            'css_arr' => ['style'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'LoginForm' => '/admin/login'
        ];
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function auth()
    {
        $validate = [
             'user'=>'string',
             'password'=>'string'
         ];
        $RequestData = \NI_request::validate($validate);
        $user = \model\admins::check($RequestData);
        if (!empty($user)) {
            $_SESSION['login'] = true;
            $_SESSION['role'] = $user->role;
            $_SESSION['user_id'] = $user->id;
            \NI_redirect::with('/admin', 'primary', 'تم تسجيل الدخول بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'خطا فى اسم المستخدم او كلمة السر[×_×]!');
        }
    }
}
