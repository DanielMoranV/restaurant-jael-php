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
Route::get('/login/:slug', function ($slug) {
    return 'pagina login ' . $slug;
});

Route::dispatch();
