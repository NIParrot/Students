<?php

NI_route::get('/admin/exam/add', function () {
    NI_Controller::run('admin\exam@add');
});
NI_route::get('/admin/exam/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\exam@edit');
});
NI_route::get('/admin/exam/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\exam@delete');
});
NI_route::get('/admin/exam', function () {
    NI_Controller::run('admin\exam@index');
});
NI_route::post('/admin/exam/add', function () {
    NI_Controller::run('admin\exam@PostAdd');

});
NI_route::post('/admin/exam/edit', function () {
    NI_Controller::run('admin\exam@PostEdit');

});
NI_route::post('/admin/exam/delete', function () {
    NI_Controller::run('admin\exam@PostDelete');

});
