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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////////////////Administración////////////////////
Route::resource('productos', 'ProductoController');
Route::resource('inventarios', 'InventarioController');
Route::resource('facturas', 'FacturaController');

/////////////////////////////AJAX///////////////////////7
Route::post('/ajaxIva', 'FacturaController@ajaxIva');