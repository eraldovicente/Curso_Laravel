<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos', 'ProdutoControlador@index')
    ->name('produtos');

Route::get('/departamentos', 'DepartamentoControlador@index')
->name('produtos');

Route::get('/usuario', function() {
    return view('usuario');
});

// Laravel 6

// composer require laravel/ui --dev
// php artisan ui vue --auth
// "npm install" e depois "npm run dev" sem aspas