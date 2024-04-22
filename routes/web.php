<?php

use Lib\Route;

Route::get('/', function () {
    echo 'pagina inicio';
});
Route::get('/login', function () {
    echo 'pagina login';
});
Route::get('/dashboard', function () {
    echo 'pagina login';
});

Route::dispatch();
