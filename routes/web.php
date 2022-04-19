<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MystoreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreFrontController;
use App\Http\Controllers\UserController;

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



// authorize user



Route::middleware('auth')->group(function () {
    Route::resource('users',UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('mystore',MystoreController::class)->except(['create','edit','delete','show']);
    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('orders/{id}/items', [OrderController::class, 'show'])->name('orders.show');
    Route::post('orders/{id}/items', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

});




Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('order', [CartController::class, 'order'])->name('order.index');
Route::Post('order', [CartController::class, 'order'])->name('order.store');

Route::get('/store',[CartController::class, 'index']);

// all stores of client
Route::get('/stores',[StoreFrontController::class,'allstores']);
// products  with and without category
Route::get('/store/{clientID}/products',[StoreFrontController::class,'index'])->name("st.prod");
Route::get('/store/{clientID}/{slug}',[StoreFrontController::class,'singleProduct'])->name("single.prod");
Route::get('/store/{clientID}/{CateId}/products',[StoreFrontController::class,'productsByCategory'])->name("cate.pro");
// all store categories
Route::get('/store/{clientID}/categories',[StoreFrontController::class,'categories']);
//single category
Route::get('/store/{clientID}/{Cslug}',[StoreFrontController::class,'category']);

//single product through category
Route::get('/store/{clientID}/{Cslug}/{Pslug}',[StoreFrontController::class,'category']);


Auth::routes();

Route::get('/',[StoreFrontController::class,'allstores']);

;
