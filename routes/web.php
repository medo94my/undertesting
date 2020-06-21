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

Auth::routes();
// HOME ROUTES
Route::get('/', 'HomeController@index')->name('index');
Route::get('/contact', 'HomeController@contact')->name('contact');
//ADMIN ROUTES
Route::get('/admin','admin@index')->name('admin')->middleware('auth');
//SHOP ROUTES
Route::get('/shop', 'ProductController@index')->name('shop');
Route::get('/shop/details/{id}', 'ProductController@show')->name('product-view');
Route::get('/shop/checkout','ProductController@checkout')->name('checkout')->middleware('auth');
Route::get('/shop/category/{category}', 'ProductController@category')->name('category');
// Payment controller
Route::get('/thankyou','PaymentController@thankyou')->name('thankyou')->middleware('auth');
Route::post('/shop/checkout/payment','PaymentController@pay_proccess')->name('pay_process')->middleware('auth');
// Cart routes
Route::get('/shop/cart/', 'CartController@index')->middleware('auth');
Route::get('/shop/details/addtocart/{id}','CartController@create')->name('cart')->middleware('auth');
Route::patch('/shop/cart/update/{id}', 'CartController@update')->middleware('auth');
Route::delete('/clear_cart', 'CartController@clear_cart')->middleware('auth');
Route::delete('/shop/cart/{id}', 'CartController@destroy')->name('remove_item');

// ADDRESS ROUTES
Route::get('/address/create','AddressController@show')->name('Address-view')->middleware('auth');
Route::post('/address/create','AddressController@create')->name('Address')->middleware('auth');
Route::delete('/address/{id}','AddressController@destroy')->name('destroy_address')->middleware('auth');
Route::get('/address/{id}/edit','AddressController@edit')->name('update_address')->middleware('auth');
Route::put('/address/{id}','AddressController@update')->name('edit_address')->middleware('auth');
