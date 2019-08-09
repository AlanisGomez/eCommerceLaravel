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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/productos', 'ProductosControllerUser@index')->name('productos');

Route::group(['prefix'=>'customer', 'namespace' => 'Customer',
'middleware' =>['auth', 'customer']], function(){

    Route::get('/categorias', 'CategoriaControllerUser@index');

    Route::get('/compras', 'CompraControllerUser@index');

    Route::get('/marcas', 'MarcaControllerUser@index');

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
        'uses' => 'ProductoControllerUser@getRemoveItem',
        'as' => 'product.remove'
    ]);

    Route::get('/shopping-cart', [
        'uses' => 'ProductosControllerUser@getCart',
        'as' => 'product.shoppingCart'
    ]);

    Route::get('/checkout', [
        'uses' => 'ProductoControllerUser@getCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);

    Route::post('/checkout', [
        'uses' => 'ProductoControllerUser@postCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);
  });



    Route::group(['prefix'=>'admin', 'namespace' => 'Admin',
    'middleware' =>['auth', 'admin']], function(){

        Route::get('/productos', 'ProductosController@index')->name('productos');

        Route::get('/detalle/{id}',  'ProductosController@show');

        Route::get('/productos/buscar' , 'ProductosController@search');

        Route::get('/create', 'ProductosController@create');

        Route::post('/create','ProductosController@store')->name('create');

        Route::get('update/{id}', 'ProductosController@edit');

        Route::post('/update/{id}','ProductosController@update')->name('update');

        Route::post('/borrarProducto', 'ProductosController@destroy')->name('borrar');

        Route::get('/usuarios', 'UsuarioController@index');
    });
