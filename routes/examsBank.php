<?php

NI_route::get('/admin/examsBank/add', function () {
    NI_Controller::run('admin\examBank@add');
});
NI_route::get('/admin/examsBank/edit/{{id}}', function ($id) {
    NI_request::$data['id'] = $id;
    NI_Controller::run('admin\examBank@edit');
});
NI_route::get('/admin/examsBank/delete/{{id}}', function ($id) {
    NI_request::$data['id'] = $id;
    NI_Controller::run('admin\examBank@delete');
});
NI_route::get('/admin/examsBank', function () {
    NI_Controller::run('admin\examBank@index');
});
NI_route::post('/admin/examsBank/add', function () {
    NI_Controller::run('admin\examBank@PostAdd');

});
NI_route::post('/admin/examsBank/edit', function () {
    NI_Controller::run('admin\examBank@PostEdit');

});
NI_route::post('/admin/examsBank/delete', function () {
    NI_Controller::run('admin\examBank@PostDelete');

});
