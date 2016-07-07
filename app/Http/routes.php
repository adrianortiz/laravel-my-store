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

    Route::get('prueba', [
        'uses'  => 'SliderController@prueba',
        'as'    => 'admin.prueba'
    ]);


});

Route::auth();

Route::get('/home', 'HomeController@index');
