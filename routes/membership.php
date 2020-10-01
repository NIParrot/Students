
<?php

NI_route::get('/admin/membership', function () {
    NI_Controller::run('admin\membership@index');
});

NI_route::get('/admin/membership/{{group_id}}', function ($group_id) {
    NI_Controller::run('admin\membership@index');
});
NI_route::post('/admin/membership/add', function () {
    NI_Controller::run('admin\membership@PostAdd');
});
