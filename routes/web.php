<?php

use Lib\Route;
use App\Controllers\LoginController;

Route::get('/', [LoginController::class, 'login']);
Route::get('/login', function () {
    return 'pagina login';
});
Route::get('/dashboard', function () {
    return 'pagina login';
});
Route::get('/login/:slug/:name', function ($slug, $name) {
    return 'pagina login ' . $slug . $name;
});

Route::dispatch();
