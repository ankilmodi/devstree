<?php
  
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
  
Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
   
Route::middleware('auth:api')->group( function () {
    Route::post('category_listing', 'API\ProductController@categoryList');
    Route::post('products_listing', 'API\ProductController@productList');
});