<?php
NI_route::get('student/login', function () {
});
NI_route::post('student/login', function () {
});
NI_route::get('/', function () {
    NI_Controller::run('students\students@index');
    //NI_redirect::path('/student/home');
});
NI_route::get('/student/home', function () {
});
