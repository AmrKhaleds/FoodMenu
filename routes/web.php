<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [FrontController::class, 'index'])->name('front');

Auth::routes(['register' => false]);

Route::post('/order', [FrontOrderController::class, 'store'])->name('request-order');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('/orders', OrderController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
});
