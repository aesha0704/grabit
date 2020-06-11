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

Route::get('/','front\HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::prefix('shop')->group(function (){
//    Route::get('/', 'ShopHomeController@index')->name('shop.dashboard');
//
//    Route::get('/login','Auth\ShopLoginController@showLoginForm')->name('shop.login');
//    Route::post('/login','Auth\ShopLoginController@login')->name('shop.login.submit');
//
//    Route::get('/logout','Auth\ShopLoginController@logout')->name('shop.logout');
//
//    Route::resource('/dashboard', 'shop\HomeController');
//    Route::resource('/products', 'shop\ProductController');
//    Route::resource('/shops', 'shop\ShopController');
//    Route::resource('/shop_banner', 'shop\ShopBannerController');
//
//    Route::resource('/categories', 'shop\CategoryController');
//    Route::resource('/cuisine', 'shop\CuisineController');
//
//
//
//});
//

Route::prefix('admin')->group(function (){

    Route::get('/', 'AdminHomeController@index')->name('admin.dashboard');

    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/dashboard/index', 'admin\HomeController@index')->name('dash');

    Route::resource('/dashboard', 'admin\HomeController');
    Route::get('/product/shop_product/{id}', 'admin\ProductController@addcreate')->name('pro');

    Route::resource('/product', 'admin\ProductController');
    Route::resource('/shop', 'admin\ShopController');
    Route::resource('/shop_banner', 'admin\ShopbannerController');
    Route::get('/categories/create_category/{id}','admin\CategoryController@addcreate')->name('cate');

    Route::resource('/categories', 'admin\CategoryController');
//    Route::get('/order_report/report', 'admin\OrderreportController@create')->name('ord_report');
//    Route::post('/order_report/report', 'admin\OrderreportController@index')->name('ord_report1');
    Route::get('/order_report/report', 'admin\OrderreportController@create')->name('ord_report');
    Route::post('/order_report/report', 'admin\OrderreportController@index')->name('ord_report1');
    Route::get('/order_report/pdf', 'admin\OrderreportController@rep')->name('rep');

    Route::resource('/order_report', 'admin\OrderreportController');

    Route::resource('/cuisine', 'admin\CuisineController');
    Route::resource('/users', 'admin\UserController');
    Route::resource('/transporter', 'admin\TransportController');
    Route::view('/transportershift','admin.transporter.transporter_shift');
    Route::view('/transporterdelivery','admin.transporter.transporter_delivery')->name('del');




});

Route::post('front_home/addcart', 'front\AddtocartController@addcart');
Route::get('front_home/sort', 'front\HomeController@sort');

Route::get('front_home/delivery', 'front\HomeController@delivery');
Route::get('front_home/recently', 'front\HomeController@recently');

Route::resource('/front_home', 'front\HomeController');

Route::view('/userlog','front.login');
Route::resource('/addtocart','front\AddtocartController');

Route::resource('/checkout','front\CheckoutController');
Route::get('/order/display','front\OrderController@index')->name('ord');

Route::resource('/order','front\OrderController');
Route::get('/feedback/display','front\FeedbackController@index')->name('feed');
Route::get('/feedback/pdf/{id}','front\FeedbackController@edit')->name('hey');
Route::resource('/feedback','front\FeedbackController');
Route::view('/profile','front.profile')->name('user_profile');


Route::get('event-registration', 'OrderController@register');
Route::post('payment', 'OrderController@order');
