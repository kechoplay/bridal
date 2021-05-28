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
Route::get('/bridal-product/', ['as' => 'bridalIndex', 'uses' => 'HomeController@bridalIndex']);
Route::get('/bridal-product/details/{slug}/{id}', ['as' => 'bridalDetails', 'uses' => 'HomeController@bridalDetails']);
Route::get('/new-product/', ['as' => 'newIndex', 'uses' => 'HomeController@bridalIndex']);
Route::get('/new-product/details/{slug}/{id}', ['as' => 'newDetails', 'uses' => 'HomeController@bridalDetails']);
Route::get('/special-product/', ['as' => 'specialIndex', 'uses' => 'HomeController@specialIndex']);
Route::get('/contact/', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::post('/contact/', ['as' => 'contactPost', 'uses' => 'HomeController@contactPost']);
Route::get('/shop/', ['as' => 'shop.index', 'uses' => 'HomeController@shopIndex']);
Route::get('/shop/list-products', ['as' => 'shop.listProducts', 'uses' => 'HomeController@listProducts']);
Route::get('/shop/product-details/{nameProduct}', ['as' => 'shop.productDetails', 'uses' => 'HomeController@productDetails']);

Route::get('/collections/shop', ['as' => 'shop.listProducts', 'uses' => 'HomeController@listProducts']);
Route::get('/collections/shop/new-arrivals', ['as' => 'shop.listProductsNew', 'uses' => 'HomeController@listProductsNew']);
Route::get('/collections/{style}', ['as' => 'shop.listProductsStyle', 'uses' => 'HomeController@listProductsStyle']);

Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\BridalController@login']);

Route::post('/admin/login', ['as' => 'admin.postLogin', 'uses' => 'Admin\BridalController@postLogin']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin_access']], function () {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'Admin\BridalController@index']);

    Route::get('', ['as' => 'admin.index', 'uses' => 'Admin\BridalController@index']);

    Route::get('/add-bridal', ['as' => 'admin.addBridal', 'uses' => 'Admin\BridalController@create']);

    Route::post('/add-bridal', ['as' => 'admin.saveBridal', 'uses' => 'Admin\BridalController@store']);

    Route::get('/update-bridal/{id}', ['as' => 'admin.editBridal', 'uses' => 'Admin\BridalController@edit']);

    Route::post('/update-bridal/{id}', ['as' => 'admin.updateBridal', 'uses' => 'Admin\BridalController@update']);

    Route::get('/delete-bridal/{id}', ['as' => 'admin.deleteBridal', 'uses' => 'Admin\BridalController@delete']);

    Route::get('/style-dress', ['as' => 'admin.listStyle', 'uses' => 'Admin\BridalController@listStyle']);

    Route::get('/add-style-dress', ['as' => 'admin.addStyle', 'uses' => 'Admin\BridalController@addStyle']);

    Route::post('/add-style-dress', ['as' => 'admin.saveStyle', 'uses' => 'Admin\BridalController@saveStyle']);

    Route::get('/edit-style-dress/{id}', ['as' => 'admin.editStyle', 'uses' => 'Admin\BridalController@editStyle']);

    Route::post('/edit-style-dress/{id}', ['as' => 'admin.updateStyle', 'uses' => 'Admin\BridalController@updateStyle']);

    Route::get('/delete-style/{id}', ['as' => 'admin.deleteStyle', 'uses' => 'Admin\BridalController@deleteStyle']);
});
