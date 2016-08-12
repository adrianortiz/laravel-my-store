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

Route::get('ventas', [
    'uses' => 'Coustumer\CartController@index',
    'as' => 'coustumer.carrito'
]);

Route::post('ventas', [
    'uses' => 'CartController@store',
    'as' => 'users.carrito.store'
]);

Route::get('client', [
    'uses'  => 'Coustumer\CoustumerController@index',
    'as'    => 'client.index'
]);

// USO DE MIDDLEWARES
Route::group(['middleware' => 'auth'], function () {

        Route::group(['prefix' => '/home', 'namespace' => 'Coustumer'], function(){

            Route::get('client/show', [
                'uses'  => 'CoustumerController@show',
                'as'    => 'client.show'
            ]);

            Route::get('client/edit', [
                'uses'  => 'CoustumerController@edit',
                'as'    => 'client.edit'
            ]);

            Route::put('client/update', [
                'uses'  => 'CoustumerController@update',
                'as'    => 'client.update'
            ]);

            Route::delete('client/delete/[id]', [
                'uses'  => 'CoustumerController@destroy',
                'as'    => 'client.destroy'
            ]);

        });

    Route::group(['middleware' => 'type.admin'], function () {

        Route::get('/home', 'HomeController@index');


        // RUTAS CON PREFIJO admin
        Route::group(['prefix' => 'home', 'namespace' => 'Admin'], function () {

            /**
             * Rutas para gestionar administradores
             */

            Route::get('admin', [
                'uses'  => 'AdminController@show',
                'as'    => 'admin.show'
            ]);

            Route::get('admin/update/{id}', [
                'uses'  => 'AdminController@edit',
                'as'    => 'admin.edit'
            ]);

            Route::put('admin/update', [
                'uses' => 'AdminController@update',
                'as' => 'admin.update'
            ]);

            Route::delete('admin/delete/{id}', [
                'uses' => 'AdminController@destroy',
                'as' => 'admin.destroy'
            ]);

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

            Route::put('slider/update', [
                'uses' => 'SliderController@update',
                'as' => 'admin.slider.update'
            ]);

            Route::get('slider/show/{id}', [
                'uses' => 'SliderController@show',
                'as' => 'admin.slider.show'
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

            Route::put('categorias/update', [
                'uses' => 'CategoriasController@update',
                'as' => 'admin.categorias.update'
            ]);

            Route::delete('categorias/{id}', [
                'uses' => 'CategoriasController@destroy',
                'as' => 'admin.categorias.destroy'
            ]);

            Route::get('categorias/show/{id}', [
                'uses' => 'CategoriasController@show',
                'as' => 'admin.categorias.show'
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

            Route::get('proveedores/edit/{id}', [
                'uses' => 'ProveedoresController@edit',
                'as' => 'admin.proveedores.edit'
            ]);

            Route::put('proveedores/update/{id}', [
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










        });

    });


});

Route::auth();


Route::get('carrito', [
    'uses' => 'Coustumer\CartController@index',
    'as' => 'cliente.carrito.index'
]);

// ADD
Route::post('carrito', [
    'uses' => 'Coustumer\CartController@store',
    'as' => 'cliente.carrito.store'
]);


// ADD BY NUMBER
Route::post('carrito/number', [
    'uses' => 'Coustumer\CartController@storeByNumber',
    'as' => 'cliente.carrito.storeByNumber'
]);

// Update item from cart
Route::put('carrito/product/orden/update', [
    'uses'  => 'Coustumer\CartController@update',
    'as'    => 'store.front.product.orden.update'
]);


// Eliminar carrito
Route::delete('carrito/trash', [
    'uses'   => 'Coustumer\CartController@trash',
    'as'    => 'store.front.product.orden.trash'
]);


// delete a item
Route::delete('carrito/product/orden/delete', [
    'uses'  => 'Coustumer\CartController@delete',
    'as'    => 'store.front.product.orden.delete'
]);


/// ========= ORDER DETAIL =========
Route::get('carrito/order', [
    'middleware' => 'auth',
    'uses'   => 'Coustumer\CartController@orderDetail',
    'as'    => 'store.front.product.orden.detail'
]);




/**
 * PAYPAL ROUTES API
 */

// Enviamos nuestro pedido a Paypal
Route::get('payment/{tiendaRoute}', [
    'uses'   => 'Coustumer\PaypalController@postPayment',
    'as'    => 'payment'
]);

// Paypal redirecciona a esta ruta
Route::get('payment/status', [
    'uses'  => 'Coustumer\PaypalController@getPaymentStatus',
    'as'    => 'payment.status'
]);


/*
* PAY CARD
*/
    Route::post('payment/card/', [
        'uses'   => 'Coustumer\OrdenController@postPaymentCard',
        'as'    => 'payment.card'
    ]);
