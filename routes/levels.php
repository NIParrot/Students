<?php

NI_route::get('/admin/levels/add', function () {
    NI_Controller::run('admin\levels@add');
});
NI_route::get('/admin/levels/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\levels@edit');
});
NI_route::get('/admin/levels/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\levels@delete');
});
NI_route::get('/admin/levels', function () {
    NI_Controller::run('admin\levels@index');
});
NI_route::post('/admin/levels/add', function () {
    NI_Controller::run('admin\levels@PostAdd');
});
NI_route::post('/admin/levels/edit', function () {
    NI_Controller::run('admin\levels@PostEdit');
});
NI_route::post('/admin/levels/delete', function () {
    NI_Controller::run('admin\levels@PostDelete');
});
