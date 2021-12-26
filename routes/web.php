<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Registro de Rotas
|
*/

Route::get('/', function () {
    return view('welcome');
});
