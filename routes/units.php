
<?php

NI_route::get('/admin/units/add', function () {
    NI_Controller::run('admin\units@add');
});
NI_route::get('/admin/units/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\units@edit');
});
NI_route::get('/admin/units/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\units@delete');
});
NI_route::get('/admin/units', function () {
    NI_Controller::run('admin\units@index');
});
NI_route::post('/admin/units/add', function () {
    NI_Controller::run('admin\units@PostAdd');

});
NI_route::post('/admin/units/edit', function () {
    NI_Controller::run('admin\units@PostEdit');

});
NI_route::post('/admin/units/delete', function () {
    NI_Controller::run('admin\units@PostDelete');
});
