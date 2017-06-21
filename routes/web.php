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

Route::get('/', 'CatalogController@index');

Auth::routes();

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@add');
Route::get('/cart/clear', 'CartController@clear');