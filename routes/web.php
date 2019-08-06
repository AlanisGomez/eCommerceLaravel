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


Route::get('/detalle/{id}',  'ProductoController@show');

Route::get('/productos','ProductoController@index')->name('productos');

Route::get('/productos/buscar' , 'ProductoController@search');

Route::get('/create', 'ProductoController@create');

Route::get('/update/{id}', 'ProductoController@edit');

Route::post('/update/{id}','ProductoController@update');

Route::post('/create','ProductoController@store');

Route::post('/borrarProducto', 'ProductoController@destroy');

Route::get('/categorias', 'CategoriaController@index');

Route::get('/usuarios', 'UsuarioController@index');

Route::get('/compras', 'CompraController@index');

Route::get('/marcas', 'MarcaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', [
    'uses' => 'ProductoController@index',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductoController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductoController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductoController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductoController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout', [
    'uses' => 'ProductoController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout', [
    'uses' => 'ProductoController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);
