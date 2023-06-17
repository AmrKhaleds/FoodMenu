<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SeatController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TableController;
use App\Models\Notification;
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

// Admin Routes
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function (){
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    // Orders Routes
    Route::post('orders/updateOrderStatus', [OrderController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    Route::resource('orders', OrderController::class);
    // Category Routes
    Route::resource('categories', CategoryController::class);
    // Products Routes
    Route::view('products/database-delete', 'dashboard.products.deleteDatabase')->name('databaseDestroy.index');
    Route::view('products/download', 'dashboard.products.download')->name('downloadProducts.index');
    Route::view('products/upload', 'dashboard.products.upload')->name('uploadProducts.index');
    Route::post('products/database-delete', [ProductController::class, 'databaseDestroy'])->name('databaseDestroy.delete');
    Route::post('products/download', [ProductController::class, 'downloadProducts'])->name('downloadProducts.download');
    Route::post('products/upload', [ProductController::class, 'uplaodBulkProducts'])->name('uploadProducts.upload');
    Route::resource('products', ProductController::class);
    // Settings route
    Route::resource('settings', SettingsController::class);
    // Offers Route
    Route::post('offers/product', [OfferController::class, 'getProducts'])->name('getProducts');
    Route::resource('offers', OfferController::class);
    // Profile Route
    Route::get('profile/{user}', [ProfileController::class, 'index'])->name('profile.index');
    // Notification Route
    Route::post('/mark-all-as-read', function(){
        Notification::where('is_read', false)->update(['is_read' => true]);
        return response()->json([
            'status' => true,
            'msg' => 'successfully mark all as read'
        ]);
    })->name('resetNotificationCounter');
    Route::get('notifications', [NotificationController::class, 'index'])->name('notification.index');
    // inDoor Routes
    Route::resource('rooms', RoomController::class);
    Route::resource('tables', TableController::class);
    // Update Status
    Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('updateCategoryStatus');
    Route::post('update-product-status', [ProductController::class, 'updateProductStatus'])->name('updateProductStatus');
});
// Auth Routes
Auth::routes(['register' => false]);
