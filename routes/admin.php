<?php
NI_route::get('/admin/login', function () {
    NI_Controller::run('admin\admin@login');
});
NI_route::post('/admin/login', function () {
    NI_Controller::run('admin\admin@auth');
});
NI_route::get('/admin', function () {
    NI_redirect::path('/admin/home');
});
NI_route::get('/admin/home', function () {
    NI_Controller::run('admin\admin@index');
});
NI_route::get('/admin/secretary/register', function () {
    NI_Controller::run('admin\secretary@register');
});
NI_route::get('/admin/secretary', function () {
    NI_Controller::run('admin\secretary@register');
});
NI_route::post('/admin/secretary/register', function () {
    NI_Controller::run('admin\secretary@PostRegister');
});


NI_route::get('/admin/student', function () {
    NI_Controller::run('admin\students@index');
});


NI_route::get('/admin/student/add', function () {
    NI_Controller::run('admin\students@add');
});
NI_route::post('/admin/student/add', function () {
    NI_Controller::run('admin\students@PostAdd');
});

NI_route::get('/admin/student/edit/{{id}}', function ($id) {
    NI_request::$data['id'] = $id;
    NI_Controller::run('admin\students@edit');
});

NI_route::post('/admin/student/edit', function () {
    NI_Controller::run('admin\students@PostEdit');

});

NI_route::get('/admin/student/delete/{{id}}', function ($id) {
    NI_request::$data['id'] = $id;
    NI_Controller::run('admin\students@delete');
});

NI_route::post('/admin/student/delete', function () {
    NI_Controller::run('admin\students@PostDelete');

});

/* NI_route::get('/admin/student/active/{{id}}', function ($id) {
    NI_request::$data['id'] = $id;
    NI_Controller::run('admin\students@PostActive');
}); */

// NI_route::post('/admin/student/active', function () {
//     NI_Controller::run('admin\students@PostActive');

// });

NI_route::get('/admin/student/disactive/{{id}}', function ($id) {
  
    model\students::disactive($id);
    NI_redirect::path('/admin/student');
});


NI_route::get('/admin/student/active/{{id}}', function ($id) {
  
    model\students::active($id);
    NI_redirect::path('/admin/student');
});