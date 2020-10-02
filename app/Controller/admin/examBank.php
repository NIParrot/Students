<?php

namespace admin;

class examBank
{
    public static function index(): void
    {
         \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','examBank','home'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'header_js_arr' => [],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/examBank']
        ];
        $data = [

            'exambank' => \model\examsBank::select(),
            'levels' => \model\levels::select()
            
        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function add(): void
    {
        
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','examBank','add'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'form' => '/admin/examsBank/add',
            'lavels' => \model\levels::select()
        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function edit(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','examBank','edit'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => \model\examsBank::find(\NI_request::$data),
            'form'=>'/admin/examsBank/edit',
            'lavels' => \model\levels::select()

        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function delete(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','examBank','delete'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => \model\examsBank::find(\NI_request::$data),
            'form'=>'/admin/examsBank/delete'
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
            'question'=>'string',
            'c1'=>'string',
            'c2'=>'string',
            'c3'=>'string',
            'c4'=>'string',
            'mark'=>'string',
            'levels_id'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examsBank::create($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/examsBank', 'primary', 'تم اضافه السؤال بنجاح');

        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function PostEdit()
    {
        $validate = [
            'id'=>['int'],
            'question'=>'string',
            'c1'=>'string',
            'c2'=>'string',
            'c3'=>'string',
            'c4'=>'string',
            'mark'=>'string',
            'levels_id'=>'int',

        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\examsBank::update($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/examsBank', 'primary', 'تم التعديل بنجاح');
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
            \NI_redirect::with('/admin/examsBank', 'primary', 'تم الحذف بنجاح');
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
