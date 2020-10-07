<?php

namespace admin;

class exam
{
    public static function index(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','exam','index'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'header_js_arr' => [],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/exam']
        ];
        $data = [
            'exams' => \model\exam::select(),

            
        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }

    public static function home(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','exam','home'];
        $static = [
            'css_arr' => ['style2'],
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

    public static function add(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','exam','add'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'form' => '/admin/exam/add',
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
        $path = ['admin','exam','edit'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => \model\exam::find(\NI_request::$data),
            'form'=>'/admin/exam/edit'
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
        $path = ['admin','exam','delete'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => \model\exam::find(\NI_request::$data),
            'form'=>'/admin/exam/delete'
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
            'name'=>['string','int'],
            'exam_date' => 'date' ,
            'TimePerMin' => 'int',
            'numberOfQuestion'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\exam::create($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/exam', 'primary', 'تم الاضافه بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function PostEdit()
    {
        $validate = [
            'id' => 'int',
            'name'=>['string','int'],
            'exam_date' => 'date' ,
            'TimePerMin' => 'int',
            'numberOfQuestion'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\exam::update($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/exam', 'primary', 'تم التعديل بنجاح');
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
        $dash = \model\exam::delete($RequestData['id']);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/exam', 'primary', 'تم الحذف بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }
}
