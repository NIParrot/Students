<?php

namespace admin;

class examQuestions
{
    public static function index(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','examQuestions','home'];
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

    public static function add(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','examQuestions','add'];
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

    public static function edit(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','examQuestions','edit'];
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

    public static function delete(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','examQuestions','delete'];
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

    public static function PostAdd()
    {
        $validate = [
            'exam_id'=>'int',
            'examsBank_id'=>'int',
            'TimePerMin'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examQuestions::create($RequestData);
        if (!empty($dash)) {
            
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'],'danger','Error in username or password[×_×]!');
        }
    }

    public static function PostEdit()
    {
        $validate = [
            'exam_id'=>'int',
            'examsBank_id'=>'int',
            'TimePerMin'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examQuestions::update($RequestData);
        if (!empty($dash)) {
            
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'],'danger','Error in username or password[×_×]!');
        }
    }
    public static function PostDelete()
    {
        $validate = [
            'id'=>'int',
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examQuestions::delete($RequestData['id']);
        if (!empty($dash)) {
            
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'],'danger','Error in username or password[×_×]!');
        }
    }
}
