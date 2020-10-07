
<?php

NI_route::get('/admin/results/add', function () {
    NI_Controller::run('admin\results@add');
});
NI_route::get('/admin/results/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\results@edit');
});
NI_route::get('/admin/results/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\results@delete');
});
NI_route::get('/admin/results', function () {
    NI_Controller::run('admin\results@index');
});
NI_route::post('/admin/results/add', function () {
    NI_Controller::run('admin\results@PostAdd');

});
NI_route::post('/admin/results/edit', function () {
    NI_Controller::run('admin\results@PostEdit');

});
NI_route::post('/admin/results/delete', function () {
    NI_Controller::run('admin\results@PostDelete');
});
