
<?php



NI_route::get('/admin/absent/{{group_id}}', function ($group_id) {
    NI_Controller::run('admin\absent@index');
});
NI_route::post('/admin/absent/add', function () {
    NI_Controller::run('admin\absent@PostAdd');

});
