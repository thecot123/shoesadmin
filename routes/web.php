<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\role;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function ()  {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'admin'], function () {
    // Các route chỉ dành cho quản trị viên
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::get('/user', 'UserController@index')->name('user');
//Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
      Route::resource('users', UserController::class);

//product
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/create', 'ProductController@create')->name('create');
 Route::post('/product','ProductController@store')->name('productstore');
 Route::get('/product/{id}/edit','ProductController@edit')->name('edit');
Route::put('/product/{id}', 'ProductController@update')->name('update');
Route::delete('/product/{id}', 'ProductController@destroy')->name('destroy');


//brand
Route::get('/brands', 'BrandController@index')->name('brand');
Route::resource('brand', BrandController::class);


//category
Route::get('/categorys', 'CategoryController@index')->name('category');
Route::resource('category', CategoryController::class);
});

// google
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback','Auth\LoginController@handleGoogleCallback');

