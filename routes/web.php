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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index');//listado
Route::get('/admin/products/create', 'ProductController@create'); //formulario
Route::post('/admin/products', 'ProductController@store'); //Registrar datos
Route::get('/admin/products/edit/{id}', 'ProductController@edit'); //formulario
Route::post('/admin/products/{id}/edit', 'ProductController@update'); //update datos
//Route::get('/admin/products/{id}/delete', 'ProductController@destroy'); //form liminar con get
Route::post('/admin/products/{id}/delete', 'ProductController@destroy'); //form eliminar post
/*Route::post('/admin/products/prueba/{id}', 'ProductController@prueba');*/

/*Route::resource('admin/prueba', 'prueba\PruebaController');*/