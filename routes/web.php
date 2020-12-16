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



Route::get('/', 'FrontendController@home')->name('home');
Route::get('detail/{id}', 'FrontendController@detail')->name('detail');
Route::get('about','FrontendController@about')->name('about');
Route::get('contact','FrontendController@contact')->name('contact');
Route::get('cart','FrontendController@cart')->name('cart');
Route::get('success','FrontendController@success')->name('success');
Route::get('history','FrontendController@history')->name('history');
Route::get('orderdetail/{id}','FrontendController@orderdetail')->name('orderdetail');
// Route::get('category','FrontendController@category')->name('category');
Route::get('category','FrontendController@allitem')->name('category');
Route::get('itemcategory/{id}','FrontendController@itemcategory')->name('itemcategory');

Route::middleware('role:admin')->group(function () {
//Backend
Route::get('dashboard','BackendController@dashboard')->name('dashboard');
//CRUD
Route::resource('brands','BrandController');
Route::resource('items','ItemController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');
Route::resource('orders', 'OrderController');
});
Auth::routes(['verify'=>true ]);

Route::resource('orders','OrderController');
Route::get('confirm/{id}','OrderController@confirm')->name('orders.confirm');
// Route::get('/home', 'HomeController@index')->name('home');
