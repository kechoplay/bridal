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
Route::get('/', ['as' => 'homeIndex', 'uses' => 'HomeController@homeIndex']);
Route::get('/bridal/', ['as' => 'bridalIndex', 'uses' => 'HomeController@bridalIndex']);
Route::get('/bridal/details', ['as' => 'bridalDetails', 'uses' => 'HomeController@bridalDetails']);
Route::get('/runway/', ['as' => 'runwayIndex', 'uses' => 'HomeController@runwayIndex']);
Route::get('/real-weddings/', ['as' => 'realWeddingsIndex', 'uses' => 'HomeController@realWeddingsIndex']);
Route::get('/wedding/details', ['as' => 'realWeddingsDetails', 'uses' => 'HomeController@realWeddingsDetails']);
Route::get('/contact/', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::get('/shop/list-products', ['as' => 'shop.listProducts', 'uses' => 'HomeController@listProducts']);
Route::get('/shop/product-details', ['as' => 'shop.productDetails', 'uses' => 'HomeController@productDetails']);


Route::group(['prefix' => 'admin', 'middleware' => []], function () {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'Admin\BridalController@index']);

    Route::get('', ['as' => 'admin.index', 'uses' => 'Admin\BridalController@index']);

    Route::get('/add-bridal', ['as' => 'admin.addBridal', 'uses' => 'Admin\BridalController@create']);
});
