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

    /**
     * Rutas para adminitrar Categorias
     */
    Route::get('categorias', [
        'uses'  => 'CategoriasController@index',
        'as'    => 'admin.categorias'
    ]);


    /**
     * Rutas para adminitrar proveedores
     */
    Route::get('proveedores', [
        'uses'  => 'ProveedoresController@index',
        'as'    => 'admin.proveedores'
    ]);

    /**
     * Rutas para adminitrar proveedores
     */
    Route::get('compras', [
        'uses'  => 'ComprasController@index',
        'as'    => 'admin.compras'
    ]);


});

Route::auth();

Route::get('/home', 'HomeController@index');
