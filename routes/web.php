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

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
	Route::get('/', 'ProductController@index');
	Route::get('/products', 'ProductController@index');//listado
	Route::get('/products/create', 'ProductController@create'); //formulario
	Route::post('/products', 'ProductController@store'); //Registrar datos
	Route::get('/products/edit/{id}', 'ProductController@edit'); //formulario
	Route::post('/products/edit', 'ProductController@update'); //update datos
	//Route::post('/products/{id}/edit', 'ProductController@update'); //update datos
	//Route::get('/products/{id}/delete', 'ProductController@destroy'); //form liminar con get
	Route::post('/products/{id}/delete', 'ProductController@destroy'); //form eliminar post

	Route::post	('/products/prueba', 'prueba\PruebaController@update');

	/*Route::resource(/prueba', 'prueba\PruebaController');*/
	Route::get('/products/{id}/images/selectFav/{image}', 'ImageController@selectFav');
	Route::get('/products/{id}/images', 'ImageController@index');
	Route::post('/products/{id}/images', 'ImageController@store');
	Route::delete('/products/{id}/images', 'ImageController@destroy');
});

