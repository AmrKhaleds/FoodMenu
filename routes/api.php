<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Products Routes
Route::post('products', [ProductController::class, 'getProducts']);
Route::post('products/{id}', [ProductController::class, 'getProduct']);
Route::post('category-products/{id}', [ProductController::class, 'getProductsByCategory']);


// Categories Routes
Route::post('categories', [CategoryController::class, 'getCategories']);
Route::post('categories/{id}', [CategoryController::class, 'getCategory']);
