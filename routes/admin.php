<?php
NI_route::get('/admin/login', function () {
    NI_Controller::run('admin\admin@login');
});
NI_route::post('/admin/login', function () {
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
NI_route::post('/admin/secretary/register', function () {
});

NI_route::get('/admin/student/register', function () {
    NI_Controller::run('admin\students@register');
});
NI_route::post('/admin/student/register', function () {
});
