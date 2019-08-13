<?php



Auth::routes();

Route::get('/install',function(){
  Artisan::call('storage:link');
});

Route::get('/correrMigracion',function(){
  Artisan::call('migrate');
});
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix'=>'admin', 'namespace' => 'Admin',
    'middleware' =>['auth', 'admin']], function(){


    Route::get('/dashboard', 'HomeControllerAdmin@index')->name('dashboard');

    Route::get('/productos', 'ProductosController@index')->name('productos');

    Route::get('/detalle/{id}',  'ProductosController@show');

    Route::get('/productos/buscar' , 'ProductosController@search')->name('buscar');

    Route::get('/create', 'ProductosController@create');

    Route::post('/create','ProductosController@store')->name('create');

    Route::get('update/{id}', 'ProductosController@edit');

    Route::get('update/{id}', 'ProductosController@update');

    Route::get('/usuarios', 'UsuarioController@index');

    Route::post('/borrar', 'ProductosController@destroy')->name('borrar');

});




Route::group(['prefix'=>'customer', 'namespace' => 'Customer',
'middleware' =>['auth', 'customer']], function(){

  Route::get('/checkout', [
      'uses' => 'ProductosControllerUser@getCheckout',
      'as' => 'checkout',
      'middleware' => 'auth'
  ]);

  Route::post('/checkout', [
      'uses' => 'ProductosControllerUser@postCheckout',
      'as' => 'checkout',
      'middleware' => 'auth'
  ]);
  
  Route::get('/productos', 'ProductosControllerUser@index')->name('productos');

  Route::get('/compras', 'ComprasController@index')->name('compras');

  Route::get('/compras/{id}', 'ComprasController@show')->name('showCompra');

    Route::get('/detalle/{id}',  'ProductosControllerUser@show');

    Route::get('/productos/buscar' , 'ProductosControllerUser@search')->name('buscar');

    Route::get('/productos', [
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
        'uses' => 'ProductosControllerUser@getRemoveItem',
        'as' => 'product.remove'
    ]);

    Route::get('/shopping-cart', [
        'uses' => 'ProductosControllerUser@getCart',
        'as' => 'product.shoppingCart'
    ]);

    Route::get('/checkout', [
        'uses' => 'ProductosControllerUser@getCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);

    Route::post('/checkout', [
        'uses' => 'ProductosControllerUser@postCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]);
  });
