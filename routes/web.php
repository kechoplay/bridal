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

Route::group(['middleware' => 'language'], function () {
    Route::get('/', ['as' => 'homeIndex', 'uses' => 'HomeController@shopIndex']);

    Route::get('/bridal-product', ['as' => 'bridalIndex', 'uses' => 'HomeController@bridalIndex']);

    Route::get('/bridal-product/details/{slug}/{id}', ['as' => 'bridalDetails', 'uses' => 'HomeController@bridalDetails']);

    Route::get('/new-product', ['as' => 'newIndex', 'uses' => 'HomeController@bridalIndex']);

    Route::get('/new-product/details/{slug}/{id}', ['as' => 'newDetails', 'uses' => 'HomeController@bridalDetails']);

    Route::get('/special-product', ['as' => 'specialIndex', 'uses' => 'HomeController@specialIndex']);

    Route::get('/pages/contact', ['as' => 'pages.contact', 'uses' => 'HomeController@contact']);

    Route::get('/pages/privacy-policy', ['as' => 'pages.privacyPolicy', 'uses' => 'HomeController@privacyPolicy']);

    Route::get('/pages/terms-of-service', ['as' => 'pages.termOfService', 'uses' => 'HomeController@termOfService']);

    Route::get('/pages/introduce', ['as' => 'pages.introduce', 'uses' => 'HomeController@introduce']);

    Route::post('/pages/contact', ['as' => 'pages.contactPost', 'uses' => 'HomeController@contactPost']);

//Route::get('/shop', ['as' => 'shop.index', 'uses' => 'HomeController@shopIndex']);

    Route::get('/shop/list-products', ['as' => 'shop.listProducts', 'uses' => 'HomeController@listProducts']);

    Route::get('/shop/product-details/{nameProduct}', ['as' => 'shop.productDetails', 'uses' => 'HomeController@productDetails']);

    Route::group(['middleware' => ['user_access']], function () {
        Route::get('/shop/cart', ['as' => 'shop.cartIndex', 'uses' => 'HomeController@cartIndex']);

        Route::post('/shop/add-cart', ['as' => 'shop.ajaxAddCart', 'uses' => 'HomeController@ajaxAddCart']);

        Route::get('/shop/cart-info', ['as' => 'shop.cartInfo', 'uses' => 'HomeController@cartInfo']);

        Route::post('/shop/cart-store', ['as' => 'shop.cartStore', 'uses' => 'HomeController@orderConfirm']);

        Route::get('/shop/order-confirm', ['as' => 'shop.orderConfirm', 'uses' => 'HomeController@orderConfirm']);

        Route::post('/shop/ajax-cart', ['as' => 'shop.ajaxCart', 'uses' => 'HomeController@ajaxCart']);

        Route::post('/shop/ajax-buy-now', ['as' => 'shop.ajaxBuyNow', 'uses' => 'HomeController@ajaxBuyNow']);

        Route::post('/shop/ajax-buy-cart', ['as' => 'shop.ajaxBuyCart', 'uses' => 'HomeController@ajaxBuyCart']);

        Route::post('/shop/check-discount', ['as' => 'checkDiscount', 'uses' => 'HomeController@checkDiscount']);

        Route::get('/account/user-detail', ['as' => 'userDetail', 'uses' => 'UserController@userDetail']);

        Route::get('/account/user-logout', ['as' => 'userLogout', 'uses' => 'UserController@userlogout']);

        Route::get('/account/user-address', ['as' => 'userAddress', 'uses' => 'UserController@userAddress']);

        Route::post('/account/address-store', ['as' => 'addressStore', 'uses' => 'UserController@addressStore']);

        Route::post('/account/address-save/{id}', ['as' => 'addressSave', 'uses' => 'UserController@addressSave']);

        Route::post('/account/address-destroy', ['as' => 'addressDestroy', 'uses' => 'UserController@addressDestroy']);

        Route::get('/order/history', ['as' => 'history', 'uses' => 'UserController@history']);

        Route::get('/order/view/{id}', ['as' => 'order-view', 'uses' => 'UserController@orderView']);

        Route::post('/order/send-feedback', ['as' => 'sendFeedback', 'uses' => 'UserController@sendFeedback']);

        Route::get('/product/feedback', ['as' => 'listFeedBack', 'uses' => 'UserController@listFeedBack']);

        Route::get('/feedback/delete/{id}', ['as' => 'deleteFeedback', 'uses' => 'UserController@deleteFeedback']);

        Route::post('/shop/check-voucher', ['as' => 'checkVoucher', 'uses' => 'HomeController@checkVoucher']);
    });

    Route::get('/collections/shop', ['as' => 'shop.listProducts', 'uses' => 'HomeController@listProducts']);

    Route::get('/collections/shop/new-arrivals', ['as' => 'shop.listProductsNew', 'uses' => 'HomeController@listProductsNew']);

    Route::get('/collections/{style}', ['as' => 'shop.listProductsStyle', 'uses' => 'HomeController@listProductsStyle']);

    Route::get('/shop/new', ['as' => 'shop.new', 'uses' => 'HomeController@listNew']);

    Route::get('/new/{style}', ['as' => 'newDetail', 'uses' => 'HomeController@newDetail']);

    Route::get('/account/login', ['as' => 'userLogin', 'uses' => 'UserController@userLogin']);
    Route::post('/account/check-login', ['as' => 'checkLogin', 'uses' => 'UserController@checkLogin']);
    Route::get('/account/register', ['as' => 'userRegister', 'uses' => 'UserController@userRegister']);
    Route::post('/account/register-save', ['as' => 'registerSave', 'uses' => 'UserController@registerSave']);
    Route::get('/account/reset-pass', ['as' => 'userResetPass', 'uses' => 'UserController@userResetPass']);
});


Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\BridalController@login']);

Route::post('/admin/login', ['as' => 'admin.postLogin', 'uses' => 'Admin\BridalController@postLogin']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin_access']], function () {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'Admin\BridalController@index']);

    Route::get('', ['as' => 'admin.index', 'uses' => 'Admin\BridalController@index']);

    Route::get('/add-product', ['as' => 'admin.addBridal', 'uses' => 'Admin\BridalController@create']);

    Route::post('/add-product', ['as' => 'admin.saveBridal', 'uses' => 'Admin\BridalController@store']);

    Route::get('/update-product/{id}', ['as' => 'admin.editBridal', 'uses' => 'Admin\BridalController@edit']);

    Route::post('/update-product/{id}', ['as' => 'admin.updateBridal', 'uses' => 'Admin\BridalController@update']);

    Route::get('/delete-product/{id}', ['as' => 'admin.deleteBridal', 'uses' => 'Admin\BridalController@delete']);

    Route::get('/category', ['as' => 'admin.listStyle', 'uses' => 'Admin\BridalController@listStyle']);

    Route::get('/add-category', ['as' => 'admin.addStyle', 'uses' => 'Admin\BridalController@addStyle']);

    Route::post('/add-category', ['as' => 'admin.saveStyle', 'uses' => 'Admin\BridalController@saveStyle']);

    Route::get('/edit-category/{id}', ['as' => 'admin.editStyle', 'uses' => 'Admin\BridalController@editStyle']);

    Route::post('/edit-category/{id}', ['as' => 'admin.updateStyle', 'uses' => 'Admin\BridalController@updateStyle']);

    Route::get('/delete-category/{id}', ['as' => 'admin.deleteStyle', 'uses' => 'Admin\BridalController@deleteStyle']);

    Route::get('/Voucher', ['as' => 'admin.listVoucher', 'uses' => 'Admin\BridalController@listVoucher']);

    Route::get('/add-voucher', ['as' => 'admin.addVoucher', 'uses' => 'Admin\BridalController@addVoucher']);

    Route::post('/add-voucher', ['as' => 'admin.saveVoucher', 'uses' => 'Admin\BridalController@saveVoucher']);

    Route::get('/edit-voucher/{id}', ['as' => 'admin.editVoucher', 'uses' => 'Admin\BridalController@editVoucher']);

    Route::post('/edit-voucher/{id}', ['as' => 'admin.updateVoucher', 'uses' => 'Admin\BridalController@updateVoucher']);

    Route::get('/delete-voucher/{id}', ['as' => 'admin.deleteVoucher', 'uses' => 'Admin\BridalController@deleteVoucher']);

    Route::get('/policy', ['as' => 'admin.policy', 'uses' => 'Admin\BridalController@policy']);

    Route::post('/policy', ['as' => 'admin.savePolicy', 'uses' => 'Admin\BridalController@savePolicy']);

    Route::get('/contact', ['as' => 'admin.contact', 'uses' => 'Admin\BridalController@contact']);

    Route::get('/order', ['as' => 'admin.order', 'uses' => 'Admin\BridalController@order']);

    Route::get('/order/detail/{id}', ['as' => 'admin.orderDetail', 'uses' => 'Admin\BridalController@orderDetail']);

    Route::post('/order/detail/change-status', ['as' => 'admin.changeStatus', 'uses' => 'Admin\BridalController@changeStatus']);

    Route::post('/order/detail/save-data', ['as' => 'admin.changeStatus', 'uses' => 'Admin\BridalController@saveDate']);

    Route::get('/sizes', ['as' => 'admin.sizes', 'uses' => 'Admin\BridalController@sizeManagement']);

    Route::post('/sizes', ['as' => 'admin.saveNewSize', 'uses' => 'Admin\BridalController@saveNewSize']);

    Route::post('/sizes/{id}', ['as' => 'admin.editSize', 'uses' => 'Admin\BridalController@editSize']);

    Route::get('/sizes/delete/{id}', ['as' => 'admin.deleteSize', 'uses' => 'Admin\BridalController@deleteSize']);

    // size
    Route::get('/colors', ['as' => 'admin.colors', 'uses' => 'Admin\BridalController@colorsManagement']);

    Route::post('/colors', ['as' => 'admin.saveNewColor', 'uses' => 'Admin\BridalController@saveNewColor']);

    Route::post('/colors/{id}', ['as' => 'admin.editColor', 'uses' => 'Admin\BridalController@editColor']);

    Route::get('/colors/delete/{id}', ['as' => 'admin.deleteColor', 'uses' => 'Admin\BridalController@deleteColor']);

    // shipping method
    Route::get('/shipping-method', ['as' => 'admin.shippingMethod', 'uses' => 'Admin\BridalController@shippingMethodManagement']);

    Route::get('/shipping-method/create', ['as' => 'admin.createShippingMethod', 'uses' => 'Admin\BridalController@createShippingMethod']);

    Route::post('/shipping-method/create', ['as' => 'admin.saveNewShippingMethod', 'uses' => 'Admin\BridalController@saveShippingMethod']);

    Route::get('/shipping-method/edit/{id}', ['as' => 'admin.editShippingMethod', 'uses' => 'Admin\BridalController@editShippingMethod']);

    Route::get('/shipping-method/delete/{id}', ['as' => 'admin.deleteShippingMethod', 'uses' => 'Admin\BridalController@deleteShippingMethod']);

    // discount program
    Route::get('/discount', ['as' => 'admin.discount', 'uses' => 'Admin\BridalController@discountManagement']);

    Route::get('/discount/create', ['as' => 'admin.createDiscount', 'uses' => 'Admin\BridalController@createDiscount']);

    Route::post('/discount/create', ['as' => 'admin.saveNewDiscount', 'uses' => 'Admin\BridalController@saveDiscount']);

    Route::get('/discount/edit/{id}', ['as' => 'admin.editDiscount', 'uses' => 'Admin\BridalController@editDiscount']);

    Route::get('/discount/delete/{id}', ['as' => 'admin.deleteDiscount', 'uses' => 'Admin\BridalController@deleteDiscount']);

    // news
    Route::get('/news/create/', ['as' => 'createView', 'uses' => 'UserController@viewCreateNew']);

    Route::post('/news/save-new/', ['as' => 'saveNew', 'uses' => 'UserController@saveNew']);

    Route::get('/news/list/', ['as' => 'listView', 'uses' => 'UserController@viewNew']);

    Route::get('/news/edit/{id}', ['as' => 'admin.editNews', 'uses' => 'UserController@editNews']);

    Route::post('/news/edit/{id}', ['as' => 'admin.updateNews', 'uses' => 'UserController@updateNews']);

    Route::get('/news/delete/{id}', ['as' => 'admin.deleteNews', 'uses' => 'UserController@deleteNews']);
});
