
<?php

NI_route::get('/admin/groups/add', function () {
    NI_Controller::run('admin\groups@add');
});
NI_route::get('/admin/groups/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\groups@edit');
});
NI_route::get('/admin/groups/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\groups@delete');
});
NI_route::get('/admin/groups', function () {
    NI_Controller::run('admin\groups@index');
});
NI_route::post('/admin/groups/add', function () {
});
NI_route::post('/admin/groups/edit', function () {
});
NI_route::post('/admin/groups/delete', function () {
});
