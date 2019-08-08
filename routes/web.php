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

Route::group(['prefix'=>'admin', 'namespace' => 'Admin',
'middleware' =>['auth', 'rol:admin']
], function(){

Route::get('/admin', 'ProductosController@welcomeAdmin');

Route::get('/productos', 'ProductosController@index');

Route::get('/productos','ProductosController@index')->name('productos');

Route::get('/detalle/{id}',  'ProductosController@show');

Route::get('/productos/buscar' , 'ProductosController@search');

Route::get('/create', 'ProductosController@create');

Route::post('/create','ProductosController@store');

Route::get('/update/{id}', 'ProductosController@edit');

Route::post('/update/{id}','ProductosController@update');

Route::post('/borrarProducto', 'ProductosController@destroy');
});



Route::group(['prefix'=>'customer', 'namespace' => 'Customer',
'middleware' => ['auth', 'rol:customer']
], function(){

  Route::get('/productos', 'ProductosControllerUser@index');

  Route::get('/productos','ProductosControllerUser@index')->name('productos');

  Route::get('/detalle/{id}',  'ProductosControllerUser@show');

  Route::get('/productos/buscar' , 'ProductosControllerUser@search');

  Route::get('/', [
      'uses' => 'ProductosControllerUser@index',
      'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductosControllerUser@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductosControllerUser@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductoController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductosControllerUser@getCart',
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

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categorias', 'CategoriaController@index');

//Route::get('/usuarios', 'UsuarioController@index');

Route::get('/compras', 'CompraController@index');

Route::get('/marcas', 'MarcaController@index');
