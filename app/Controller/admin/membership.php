<?php

namespace admin;

class membership
{
    public static function index(): void
    {
        \NI_security::authorized('login', true, '/admin/login');
        \NI_security::authorized('role', 'admin', '/admin/login');
        $path = ['admin','membership','home'];
        $static = [
            'css_arr' => ['datatablefinal','style4'],
            'header_js_arr' => [],
            'footer_js_arr' => ['datatable','jquery.dataTables.min','dataTables.buttons.min','buttons.flash.min','jszip.min','pdfmake.min','vfs_fonts','buttons.html5.min','buttons.print.min','privet/examBank','privet/membership']
        ];
        $data = [
            'memberships' => \model\memberShip::select(),
            'students' => \model\students::select(),
            'groups' => \model\groups::select(),
            'form'=>'/admin/membership/add'

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
            'month'=>'string',
            'groups_id'=>'int',
            'students_id'=>'int',
        ];
        $RequestData = \NI_request::validate($validate);
        $dash = \model\memberShip::create($RequestData);
        if (!empty($dash)) {
            \NI_redirect::with('/admin/membership', 'primary', 'تم الاضافه بنجاح');
        } else {
            \NI_redirect::with($_SERVER['REQUEST_URI'], 'danger', 'Error in username or password[×_×]!');
        }
    }
}
