<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'FrontController@index',
    'as' => 'store.index'
]);

Route::get('/item/{id}/{slug}', [
    'uses'  => 'FrontController@showItems',
    'as'    => 'store.show.item'
]);

Route::get('categoria/{id}/{slug}', [
    'uses'  => 'FrontController@showItemsByCategory',
    'as'    => 'store.show.item.category'
]);

Route::get('insert', 'Coustumer\CoustumerController@index');
Route::post('insert', 'Coustumer\CoustumerController@create');

Route::get('ventas', [
    'uses' => 'Coustumer\CartController@index',
    'as' => 'coustumer.carrito'
]);

Route::post('ventas', [
    'uses' => 'CartController@store',
    'as' => 'users.carrito.store'
]);



// USO DE MIDDLEWARES
Route::group(['middleware' => 'auth'], function () {

//    Route::group(['prefix' => '/', 'namespace' => 'Coustumer'], function(){
//
//    });


    Route::group(['middleware' => 'type.admin'], function () {

        Route::get('/home', 'HomeController@index');


        // RUTAS CON PREFIJO admin
        Route::group(['prefix' => 'home', 'namespace' => 'Admin'], function () {

            /**
             * Rutas para administrar coustumers
             */

            Route::get('coustumers', [
                'uses'  => 'CoustumerController@show',
                'as'    => 'coustumer.show'
            ]);

            Route::get('coustumer/update/{id}', [
                'uses'  => 'CoustumerController@edit',
                'as'    => 'coustumer.edit'
            ]);

            Route::put('coustumer/update', [
                'uses' => 'CoustumerController@update',
                'as' => 'coustumer.update'
            ]);

            Route::delete('coustumer/delete/{id}', [
                'uses' => 'CoustumerController@destroy',
                'as' => 'coustumer.destroy'
            ]);

            /**
             * Rutas para administrar el Slider
             */
            Route::get('slider', [
                'uses' => 'SliderController@index',
                'as' => 'admin.slider'
            ]);

            Route::post('slider', [
                'uses' => 'SliderController@store',
                'as' => 'admin.slider.store'
            ]);

            Route::delete('slider/{id}', [
                'uses' => 'SliderController@destroy',
                'as' => 'admin.slider.destroy'
            ]);


            /**
             * Rutas para administrar Items
             */
            Route::get('items', [
                'uses' => 'ItemsController@index',
                'as' => 'admin.items'
            ]);

            Route::post('items', [
                'uses' => 'ItemsController@store',
                'as' => 'admin.items.store'
            ]);

            Route::get('items/show', [
                'uses' => 'ItemsController@show',
                'as' => 'admin.items.show'
            ]);

            Route::put('items/update', [
                'uses' => 'ItemsController@update',
                'as' => 'admin.items.update'
            ]);

            /**
             * Rutas para administrar Categorias
             */
            Route::get('categorias', [
                'uses' => 'CategoriasController@index',
                'as' => 'admin.categorias'
            ]);

            Route::post('categorias', [
                'uses' => 'CategoriasController@store',
                'as' => 'admin.categorias.store'
            ]);

            Route::put('categorias/{id}', [
                'uses' => 'CategoriasController@update',
                'as' => 'admin.categorias.update'
            ]);

            Route::delete('categorias/{id}', [
                'uses' => 'CategoriasController@destroy',
                'as' => 'admin.categorias.destroy'
            ]);

            Route::get('categorias/actualizar/{id}', [
                'uses' => 'CategoriasController@edit',
                'as' => 'admin.categorias.editar'
            ]);


            /**
             * Rutas para administrar proveedores
             */
            Route::get('proveedores', [
                'uses' => 'ProveedoresController@index',
                'as' => 'admin.proveedores'
            ]);

            Route::post('proveedores', [
                'uses' => 'ProveedoresController@store',
                'as' => 'admin.proveedores.store'
            ]);

            Route::put('proveedores/updatess', [
                'uses' => 'ProveedoresController@update',
                'as' => 'admin.proveedores.update'
            ]);

            Route::delete('proveedores/delete/{id}', [
                'uses' => 'ProveedoresController@destroy',
                'as' => 'admin.proveedores.destroy'
            ]);

            Route::get('proveedores/show/{id}', [
                'uses' => 'ProveedoresController@show',
                'as' => 'admin.proveedores.show'
            ]);

            /**
             * Rutas para administrar compras
             */
            Route::get('compras', [
                'uses' => 'ComprasController@index',
                'as' => 'admin.compras'
            ]);

            Route::post('compras', [
                'uses' => 'ComprasController@store',
                'as' => 'admin.compras.store'
            ]);



            Route::get('ventas', [
                'uses' => 'CartController@index',
                'as' => 'admin.carrito'
            ]);

            Route::post('ventas', [
                'uses' => 'CartController@store',
                'as' => 'user.carrito.store'
            ]);






        });

    });


});

Route::auth();
