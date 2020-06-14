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


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Sub Categaory Route Start */

Route::get('/sub-category-list','SubCategoryController@index')->name('subcategoryList');
Route::get('/sub-category-create','SubCategoryController@create')->name('subcategoryCreate');
Route::post('/sub-category-create','SubCategoryController@store')->name('subcategoryStore');
Route::get('/sub-category-edit/{id}','SubCategoryController@edit')->name('subcategoryEdit');
Route::post('/sub-category-update/{id}','SubCategoryController@update')->name('subcategoryUpdate');
Route::delete('/sub-category-delete/{id}','SubCategoryController@destroy')->name('subcategoryDelete');

/*Sub Categaory Route End */

/*Product Route Start */

Route::get('/product-list','ProductController@index')->name('productList');
Route::get('/product-create','ProductController@create')->name('productCreate');
Route::post('/product-create','ProductController@store')->name('productStore');
Route::get('/product-edit/{id}','ProductController@edit')->name('productEdit');
Route::post('/product-update/{id}','ProductController@update')->name('productUpdate');
Route::delete('/product-delete/{id}','ProductController@destroy')->name('productDelete');

/*Product Route End */

