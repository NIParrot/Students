<?php
NI_route::get('/student/login', function () {
    NI_Controller::run('students\students@login');
});
NI_route::post('/student/login', function () {
    NI_Controller::run('students\students@auth');
});
NI_route::get('/', function () {
    NI_redirect::path('/student/home');
});
NI_route::get('/student/home', function () {
    NI_Controller::run('students\students@index');
});
