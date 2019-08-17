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
Route::post('/cargarCarrito','CarritoController@cargarCarrito');
Route::get('/getCarrito','CarritoController@getCarrito');

Route::post('/eliminarProductoDeCarrito','CarritoController@eliminarProductoDeCarrito');


