<?php

namespace admin;

class groups
{
    public static function index(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','groups','home'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/grouphome'],
            'header_js_arr' => []
        ];
        $data = [
            'groups' => \model\groups::select(),
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
        $path = ['admin','groups','add'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/grouphome'],
            'header_js_arr' => []
        ];
        $data = [
            'levels' => \model\levels::select()
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
        $path = ['admin','groups','edit'];
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

    public static function delete(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','groups','delete'];
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
            'name' => 'string' ,
            'levels_id' => 'int' ,
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\groups::create($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/groups', 'primary', 'تم اضافه المجموعه بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function PostEdit()
    {
        $validate = [
            'name' => 'string' ,
            'group_data' => 'string' ,
            'levels_id' => 'int' ,
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\groups::update($RequestData);
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
        $dash = \model\groups::delete($RequestData['id']);
        if (!empty($dash)) {
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }
}
