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
    return view('initial.welcome');//ディレクトリ名.ファイル名
});

Route::get('/products/index','ProductsController@index');

Route::get('/products/add','ProductsController@add');

Route::post('products/add', 'ProductsController@create');

Route::get('products/edit', 'ProductsController@edit');
