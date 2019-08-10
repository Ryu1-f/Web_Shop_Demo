<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ownersのREST APIを定義.
Route::resource('owners', 'OwnerController');

// productsのREST APIを定義
Route::resource('products', 'ProductsController');
// Route::group(['middleware' => ['api']], function(){
//     Route::resource('products', 'ProductsController');
// });
