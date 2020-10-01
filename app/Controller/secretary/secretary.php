<?php
namespace secretary;

class secretary
{
    public static function index()
    {
        \NI_security::authorized('login', true, '/secretary/login');
        \NI_security::authorized('role', 'secretary', '/secretary/login');
        $path = ['secretary','home'];
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

    public static function login()
    {
        \NI_security::unauthorized('login', true, '/secretary');
        $path = ['secretary','login'];
        $static = [
            'css_arr' => ['style'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'LoginForm' => '/secretary/login'
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
            \NI_redirect::with('/secretary', 'primary', 'تم تسجيل الدخول بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'خطا فى اسم المستخدم او كلمة السر[×_×]!');
        }
    }
}
