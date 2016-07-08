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
        'uses'  => 'FrontController@index',
        'as'    => 'store.index'
]);

Route::group(['prefix' => 'home', 'namespace' => 'Admin'], function () {

    /**
     * Rutas para adminitrar el Slider
     */
    Route::get('slider', [
        'uses'  => 'SliderController@index',
        'as'    => 'admin.slider'
    ]);

    Route::post('slider', [
        'uses'  => 'SliderController@store',
        'as'    => 'admin.slider.store'
    ]);

    Route::delete('slider/{id}', [
       'uses'   => 'SliderController@destroy',
        'as'    => 'admin.slider.destroy'
    ]);


    /**
     * Rutas para adminitrar Items
     */
    Route::get('items', [
        'uses'  => 'ItemsController@index',
        'as'    => 'admin.items'
    ]);

    Route::post('items', [
        'uses'  => 'ItemsController@store',
        'as'    => 'admin.items.store'
    ]);

    /**
     * Rutas para adminitrar Categorias
     */
    Route::get('categorias', [
        'uses'  => 'CategoriasController@index',
        'as'    => 'admin.categorias'
    ]);

    Route::post('categorias', [
        'uses'  => 'CategoriasController@store',
        'as'    => 'admin.categorias.store'
    ]);

    Route::put('categorias/{id}', [
        'uses'  => 'CategoriasController@update',
        'as'    => 'admin.categorias.update'
    ]);

    Route::delete('categorias/{id}', [
        'uses'   => 'CategoriasController@destroy',
        'as'    => 'admin.categorias.destroy'
    ]);


    /**
     * Rutas para adminitrar proveedores
     */
    Route::get('proveedores', [
        'uses'  => 'ProveedoresController@index',
        'as'    => 'admin.proveedores'
    ]);

    Route::post('proveedores', [
        'uses'  => 'ProveedoresController@store',
        'as'    => 'admin.proveedores.store'
    ]);

    /**
     * Rutas para adminitrar proveedores
     */
    Route::get('compras', [
        'uses'  => 'ComprasController@index',
        'as'    => 'admin.compras'
    ]);

    Route::post('compras', [
        'uses'  => 'ComprasController@store',
        'as'    => 'admin.compras.store'
    ]);


});

Route::auth();

Route::get('/home', 'HomeController@index');
