<?php
NI_route::get('/secretary/login', function () {
});
NI_route::post('/secretary/login', function () {
});
NI_route::get('/secretary', function () {
    NI_redirect::path('/secretary/home');
});
NI_route::get('/secretary/home', function () {
});
