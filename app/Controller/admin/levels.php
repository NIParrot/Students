<?php

namespace admin;

use \model\levels as Mlevels;

class levels
{
    public static function index(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','levels','home'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/levels-homepage'],
            'header_js_arr' => []
        ];
        $data = [
            'levels' => Mlevels::select()
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
        $path = ['admin','levels','add'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'form' => '/admin/levels/add'
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
        $path = ['admin','levels','edit'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => Mlevels::find(\NI_request::$data),
            'form'=>'/admin/levels/edit'
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
        $path = ['admin','levels','delete'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => Mlevels::find(\NI_request::$data),
            'form'=>'/admin/levels/delete'
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
            'name'=>['string']
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\levels::create($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/levels', 'primary', 'تم الاضافة بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'حدث خطا غير متوقع برجاء التواصل مع المهندس المسؤول');
        }
    }

    public static function PostEdit()
    {
        $validate = [
            'id'=>['int'],
            'name' => 'string'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\levels::update($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/levels', 'primary', 'تم التعديل بنجاح');
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
        $dash = \model\levels::delete($RequestData['id']);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/levels', 'primary', 'تم الحذف بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }
}
