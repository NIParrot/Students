<?php

namespace admin;

class students
{
    public static function index(): void
    {
         \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','students','home'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'header_js_arr' => [],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/examBank']
        ];
        $data = [

            'students' => \model\students::select(),
            'groups' => \model\groups::select(),
            'l_id' => \model\groups::select('levels_id'),
            'levels' => \model\levels::select(),
            
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
        $path = ['admin','students','add'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'form' => '/admin/student/add',
            'students' => \model\students::select(),
            'groups' => \model\groups::select()
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
            'name'=>'string',
            'user'=>'string',
            'password'=>'string',
            'phone'=>'string',
            'groups_id'=>'int',
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\students::create($RequestData);
        print_r($dash);
        if (!empty($dash)) {
             \NI_redirect::with('/admin/student', 'primary', 'تم اضافه الطالب  بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function edit(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','students','edit'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => \model\students::find(\NI_request::$data),
            'form'=>'/admin/student/edit',
            'groups' => \model\groups::select()
        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }


    public static function PostEdit()
    {
        $validate = [
            'id'=>['int'],
            'name'=>'string',
            'user'=>'string',
            'password'=>'string',
            'phone'=>'string',
            'groups_id'=>'int',

        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\students::update($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/student', 'primary', 'تم التعديل بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }

    public static function delete(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','students','delete'];
        $static = [
            'css_arr' => ['style4'],
            'header_js_arr' => [],
            'footer_js_arr' => []
        ];
        $data = [
            'id' => \NI_request::$data['id'],
            'modeldata' => \model\students::find(\NI_request::$data),
            'form'=>'/admin/student/delete'
        ];
        \NI_view::TwigComponents(['nav'], null);
        \NI_view::Twig($path, $static, $data);
        $error = [
            'ErrorType' => $_COOKIE['ErrorType']??null,
            'ErrorMsg'=> $_COOKIE['ErrorMsg']??null
        ];
    }
    public static function PostDelete()
    {
        $validate = [
            'id'=>'int'
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\students::delete($RequestData['id']);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/student', 'primary', 'تم الحذف بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }


    
}
