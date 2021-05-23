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
    return view('index');
});
Route::get('/bridal/', ['as' => 'bridalIndex', 'uses' => 'HomeController@bridalIndex']);
Route::get('/runway/', ['as' => 'runwayIndex', 'uses' => 'HomeController@runwayIndex']);
Route::get('/real-weddings/', ['as' => 'realWeddingsIndex', 'uses' => 'HomeController@realWeddingsIndex']);
Route::get('/contact/', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::get('/shop/list-products', ['as' => 'shop.listProducts', 'uses' => 'HomeController@listProducts']);
Route::get('/shop/product-details', ['as' => 'shop.productDetails', 'uses' => 'HomeController@productDetails']);

