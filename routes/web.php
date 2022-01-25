<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','FrontendController@index')->name('index');
Route::get('/category-product/{id}','FrontendController@categoryProduct')->name('category.product');
Route::get('/subcategory-product/{id}','FrontendController@subcategoryProduct')->name('subcategory.product');
Route::get('/all-product', 'FrontendController@allProduct')->name('all_product');
Route::get('/details-product/{id}', 'FrontendController@detailsProduct')->name('details_product');
Route::get('/product-search', 'FrontendController@searchProduct')->name('search_product');
Route::get('/shopping-cart','FrontendController@shoppingCart')->name('shopping.cart');

//shopping-caer
Route::post('/add-to-cart','CartController@addtoCart')->name('insert.cart');
Route::post('/update-cart','CartController@updateCart')->name('update.cart');
Route::get('/show-cart','CartController@showCart')->name('show.cart');
Route::get('/delete-cart/{rowId}','CartController@deleteCart')->name('delete.cart');



//customer-dashboard
Route::get('/customer-signup', 'CheckoutController@customerSignup')->name('customer.signup');
Route::get('/customer-login','CheckoutController@customerLogin')->name('customer.login');
Route::post('/signup-store','CheckoutController@signup')->name('signup.store');
Route::get('/verify-email','CheckoutController@verifyEmail')->name('verify.email');
Route::post('/verify-store','CheckoutController@verifyStore')->name('verify.store');
Route::get('/checkout','CheckoutController@checkout')->name('customer.checkout');
Route::post('/checkout-store','CheckoutController@checkoutStore')->name('customer.checkout.store');

Auth::routes();

Route::get('/get-subcategory/{id}', 'DataController@getSubCategory');
Route::group(['middleware' => ['auth','admin']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('logo','LogoController');
 
    Route::resource('contact','ContactController');
    Route::resource('credential','CredentialController');
    Route::resource('slider','SliderController');
    Route::resource('about','AboutController');
    Route::resource('category','CategoryController');
    Route::resource('subcategory','SubCategoryController');
    Route::resource('brand','BrandController');
    Route::resource('color','ColorController');
    Route::resource('size','SizeController');
    Route::resource('product','ProductController');
    Route::resource('frontbanner','FrontBannerController');
    Route::get('product-available/{product}','ProductController@available')->name('product.available');
    Route::get('product-notavailable/{product}','ProductController@notavailable')->name('product.notavailable');
    Route::get('product-feature/{product}','ProductController@feature')->name('product.feature');
    Route::get('product-notfeature/{product}','ProductController@notfeature')->name('product.notfeature');
    Route::get('product-special/{product}','ProductController@special')->name('product.special');
    Route::get('product-notspecial/{product}','ProductController@notspecial')->name('product.notspecial');

    //customer
    Route::get('customer-view/','CustomerController@view')->name('customer.view');
    Route::get('customer-draft/','CustomerController@draft')->name('customer.draft');
    Route::post('customer-delete/{id}','CustomerController@delete')->name('customer.delete');
    //order
    Route::get('/pending-order-list', 'OrderController@pending')->name('pending.order.list');
    Route::get('/approved-order-list', 'OrderController@approved')->name('approved.order.list');
    Route::get('/order_details/{id}', 'OrderController@details')->name('order_details');
    Route::get('/order_approve/{id}', 'OrderController@approve')->name('order_approve');
    //user-add
    Route::get('/user-get', 'UserController@getUser')->name('get.user');
    Route::get('/user-add', 'UserController@addUser')->name('add.user');
    Route::post('/user-store', 'UserController@storeUser')->name('store.user');
    Route::delete('/user-delete', 'UserController@deleteUser')->name('delete.user');
});



Route::group(['middleware' => ['auth','customer']], function () {
    
    Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
    Route::get('/customer-edit-profile','DashboardController@edit')->name('customer.edit');
    Route::post('/customer-update-profile','DashboardController@update')->name('customer.update');
    Route::get('/customer-password-change','DashboardController@change')->name('customer.password');
    Route::post('/customer-password-update','DashboardController@updatePassword')->name('customer.password.update');
    Route::get('/customer-payment','DashboardController@payment')->name('customer.payment');
    Route::post('/customer-payment-store','DashboardController@paymentStore')->name('customer.payment.store');
    Route::get('/order-list', 'DashboardController@orderList')->name('customer.order.list');
    Route::get('/order-details/{id}', 'DashboardController@orderDetails')->name('customer.order.details');

   
});



Route::group(['middleware' => ['auth','ambassador']], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/brand-product', 'UserController@brandProduct')->name('brand.product');
    Route::get('/brand-order', 'UserController@orderListBrand')->name('brand.order');
});