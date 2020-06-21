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
//ADMIN ROUTES
Route::get('/admin','admin@index')->name('admin');
//SHOP ROUTES
Route::get('/shop', 'ProductController@index')->name('shop');
Route::get('/shop/details/{id}', 'ProductController@show')->name('product-view');
Route::get('/shop/checkout','ProductController@checkout')->name('checkout');
Route::get('/shop/category/{category}', 'ProductController@category')->name('category');
// Payment controller
Route::get('/thankyou','PaymentController@thankyou')->name('thankyou');
Route::post('/shop/checkout/payment','PaymentController@pay_proccess')->name('pay_process');
// Cart routes
Route::get('/shop/cart/', 'CartController@index');
Route::get('/shop/details/addtocart/{id}','CartController@create')->name('cart');
Route::patch('/shop/cart/update/{id}', 'CartController@update');
Route::delete('/clear_cart', 'CartController@clear_cart');
Route::delete('/shop/cart/{id}', 'CartController@destroy')->name('remove_item');

// ADDRESS ROUTES
Route::post('/address/create','AddressController@create')->name('Address')->middleware('auth');
Route::delete('/address/{id}','AddressController@destroy')->name('destroy_address')->middleware('auth');
Route::get('/address/{id}/edit','AddressController@edit')->name('update_address')->middleware('auth');
Route::put('/address/{id}','AddressController@update')->name('edit_address')->middleware('auth');
