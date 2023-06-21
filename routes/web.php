<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\InformController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FE\SurveyController;
use App\Http\Controllers\FE\HomepageController;
use App\Http\Controllers\FE\CartController;
use App\Http\Controllers\FE\CheckoutController;
use App\Http\Controllers\OrderController;
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


Route::resource('productdetail', ProductDetailController::class);

Route::get('/productimages', 'ProductImageController@index')->name('images');
Route::resource('productimage', ProductImageController::class);

//banner
Route::get('/banners', 'BannerController@index')->name('banners');
Route::resource('banner', BannerController::class);

//slider
Route::get('/sliders', 'SliderController@index')->name('sliders');
Route::resource('slider', SliderController::class);

//inform
Route::get('/informs', 'InformController@index')->name('informs');
Route::resource('inform', InformController::class);
//coupon
Route::get('/coupons', 'CouponController@index')->name('coupons');
Route::resource('coupon', CouponController::class);
//order
Route::get('/orders', 'OrderController@index')->name('orders');
Route::put('/order/{id}/confirm', [OrderController::class, 'confirmOrder'])->name('order.confirm');
Route::resource('order', OrderController::class);
});

// google
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback','Auth\LoginController@handleGoogleCallback');
//Shop
Route::prefix('shop')->group(function () {
    Route::get('/', [App\Http\Controllers\FE\ProductController::class, 'index'])->name('shop');
    Route::get('/{name}', [App\Http\Controllers\FE\ProductController::class, 'categoryOrBrand'])->name('shop.category_or_brand');

    Route::get('/product/{id}-{slug}',[App\Http\Controllers\FE\ProductController::class, 'show']);
    Route::post('/product/{id}',[App\Http\Controllers\FE\ProductController::class, 'postComment']);
});

//Cart
Route::post('/add-cart', [CartController::class, 'addCart'])->name('addCart');
Route::get('/view-cart', [CartController::class, 'viewCart'])->name('viewCart');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clearCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/remove-cart-item', [CartController::class, 'removeCartItem'])->name('removeCartItem');
Route::post('/update-cart-qty', [CartController::class, 'updateCartQty'])->name('updateCartQty');
Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('applyCoupon');
Route::post('/addOrder', [CartController::class, 'addOrder'])->name('addOrder');

//Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/save-cart', [CheckoutController::class, 'saveCart'])->name('saveCart');
// homepage 
Route::get('/homepage', [App\Http\Controllers\FE\HomepageController::class, 'index'])->name('homepage');
//inform
Route::get('/informfe', [App\Http\Controllers\InformController::class, 'fe'])->name('informfe');
//survey
Route::get('/surveyfe', [App\Http\Controllers\FE\SurveyController::class, 'index'])->name('survey');
Route::post('/survey/submit', [SurveyController::class, 'submit'])->name('survey.submit');
Route::get('/survey', [SurveyController::class, 'admin'])->name('survey.admin');
Route::get('/survey/create', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
Route::delete('/survey/{id}', [SurveyController::class, 'destroy'])->name('survey.destroy');
