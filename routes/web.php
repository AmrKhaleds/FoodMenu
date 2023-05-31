<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\FrontOrderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Front Routes
Route::get('/', [FrontController::class, 'index'])->name('front');
Route::post('order', [FrontOrderController::class, 'store'])->name('request-order');

// Admin Routes
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('orders', OrderController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    // Update Status
    Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('updateCategoryStatus');
    Route::post('update-product-status', [ProductController::class, 'updateProductStatus'])->name('updateProductStatus');
});

Auth::routes(['register' => false]);
