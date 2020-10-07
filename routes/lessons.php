
<?php

NI_route::get('/admin/lessons/add', function () {
    NI_Controller::run('admin\lessons@add');
});
NI_route::get('/admin/lessons/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\lessons@edit');
});
NI_route::get('/admin/lessons/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\lessons@delete');
});
NI_route::get('/admin/lessons', function () {
    NI_Controller::run('admin\lessons@index');
});
NI_route::post('/admin/lessons/add', function () {
    NI_Controller::run('admin\lessons@PostAdd');

});
NI_route::post('/admin/lessons/edit', function () {
    NI_Controller::run('admin\lessons@PostEdit');

});
NI_route::post('/admin/lessons/delete', function () {
    NI_Controller::run('admin\lessons@PostDelete');
});
