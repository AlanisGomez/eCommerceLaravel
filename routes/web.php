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

Route::get('/productos', 'ProductoController@index');

Route::get('/categorias', 'CategoriaController@index');

Route::get('/usuarios', 'UsuarioController@index');

Route::get('/compras', 'CompraController@index');

Route::get('/marcas', 'MarcaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
