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
Route::get('about','FrontendController@about')->name('about');
Route::get('contact','FrontendController@contact')->name('contact');
Route::get('post','FrontendController@post')->name('post');


//Backend
Route::get('dashboard','BackendController@dashboard')->name('dashboard');
//CRUD
Route::resource('brands','BrandController');
Route::resource('items','ItemController');
Route::resource('categories','CategoryController');
Route::resource('subcategories','SubcategoryController');