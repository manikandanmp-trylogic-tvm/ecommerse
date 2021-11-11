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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/ecom', EcommController::class);
Route::get('/cart','EcommController@cart');
Route::get('/about','EcommController@about');
Route::get('/shop','EcommController@shop')->name('product.shop');
Route::get('/checkout','EcommController@checkout');
Route::get('/deatil/{slug}/show','EcommController@show')->name('ecom.show');
Route::get('/product/{id}/name/{name}/{regular_price}','EcommController@store')->name('product.store');
Route::get('/login','EcommController@login')->name('login');
Route::post('/loginto','UserController@login')->name('login.owm');
Route::get('/search','EcommController@search')->name('login');
Route::get('/addtocart/{id}','EcommController@addtocart')->name('addto.cart');
Route::get('/deletecart/{id}','EcommController@deletecart')->name('deleteto.cart');
Route::post('/order','EcommController@order')->name('order');
Route::post('/newuser','EcommController@register')->name('register');
Route::get('/myorder','EcommController@myorder')->name('myorder');
Route::view('/register','ecom.register');
Route::view('/dashboard','ecom.admindash');
Route::get('/logout', function () {

    Session::forget('user');
    return redirect('/login');
});
      


