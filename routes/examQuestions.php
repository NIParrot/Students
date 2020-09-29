<?php

NI_route::get('/admin/examQuestions/add', function () {
    NI_Controller::run('admin\examQuestions@add');
});
NI_route::get('/admin/examQuestions/edit/{{id}}', function ($id) {
    NI_Controller::run('admin\examQuestions@edit');
});
NI_route::get('/admin/examQuestions/delete/{{id}}', function ($id) {
    NI_Controller::run('admin\examQuestions@delete');
});
NI_route::get('/admin/examQuestions', function () {
    NI_Controller::run('admin\examQuestions@index');
});
NI_route::post('/admin/examQuestions/add', function () {
});
NI_route::post('/admin/examQuestions/edit', function () {
});
NI_route::post('/admin/examQuestions/delete', function () {
});
