<?php

namespace admin;

class examBank
{
    public static function index(): void
    {
        //NI_security::unauthorized('login',true,'/dashboard');
        //NI_security::authorized('login',true,'/dashboard/login');
        $path = ['admin','examBank','home'];
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
        $path = ['admin','examBank','add'];
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
        $path = ['admin','examBank','edit'];
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
        $path = ['admin','examBank','delete'];
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
            'question'=>'string',
            'c1'=>'string',
            'c2'=>'string',
            'c3'=>'string',
            'c4'=>'string',
            'mark'=>'string',
            'levels_id'=>'id'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examsBank::create($RequestData);
        if (!empty($dash)) {
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function PostEdit()
    {
        $validate = [
            'question'=>'string',
            'c1'=>'string',
            'c2'=>'string',
            'c3'=>'string',
            'c4'=>'string',
            'mark'=>'string',
            'levels_id'=>'id'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examsBank::update($RequestData);
        if (!empty($dash)) {
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }
    public static function PostDelete()
    {
        $validate = [
            'id'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examsBank::delete($RequestData['id']);
        if (!empty($dash)) {
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function uploadCsv()
    {
        $csvFile = $_FILES["file"]["tmp_name"];
    
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($csvFile, "r");

            while (! feof($file)) {
                $arrayData = fgetcsv($file);
                $postData = [
                    'question' => $arrayData[0],
                    'c1' => $arrayData[1],
                    'c2' => $arrayData[2],
                    'c3' => $arrayData[3],
                    'c4' => $arrayData[4],
                    'mark' => $arrayData[5],
                    'levels_id' => $arrayData[6]
                ];
                \model\examsBank::create($postData);
            }

            fclose($file);
        }
    }
}
