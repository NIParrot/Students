<?php
namespace students;

use NI_route;

class students
{
    public static function index()
    {
        \NI_security::authorized('login', true, '/student/login');
        $path = ['students','home'];
        $static = [
            'css_arr' => [],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'routes' => (new NI_route)->Routes()['post']
            
        ];
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function login()
    {
        \NI_security::unauthorized('login', true, '/');
        $path = ['students','login'];
        $static = [
            'css_arr' => ['style'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'LoginForm' => '/student/login'
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
        $user = \model\students::check($RequestData);
        if (!empty($user)) {
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'student';
            $_SESSION['user_id'] = $user->id;
            \NI_redirect::with('/', 'primary', 'تم تسجيل الدخول بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'خطا فى اسم المستخدم او كلمة السر[×_×]!');
        }
    }
}
