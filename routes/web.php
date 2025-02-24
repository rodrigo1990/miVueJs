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


Route::get('/get','ProductoController@getProductos');
Route::get('/getCategorias','ProductoController@getCategorias');
Route::get('/getBuscarProductos/{producto}','ProductoController@getBuscarProductos');
Route::post('/getProducto','ProductoController@getProducto');


Route::post('/cargarCarrito','CarritoController@cargarCarrito');


Route::get('/getCarrito','CarritoController@getCarrito');


Route::post('/updateCantidad','CarritoController@updateCantidad');


Route::post('/eliminarProductoDeCarrito','CarritoController@eliminarProductoDeCarrito');

Route::post('/getTotal','CarritoController@getTotalCarrito');
Route::post('/getSubTotal','CarritoController@getSubTotalCarrito');
Route::post('/getDescuentos','CarritoController@getDescuentosCarrito');
