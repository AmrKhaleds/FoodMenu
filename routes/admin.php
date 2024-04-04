<?php

use App\Http\Controllers\Admin\{
    BannerController,
    CategoryController,
    CityController,
    HomeController,
    NotificationController,
    OfferController,
    OrderController,
    PlaceController,
    ProductController,
    ProfileController,
    RoomController,
    SettingsController,
    TableController
};
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

    // Banners Routes
    Route::resource('banners', BannerController::class);

    // Products Routes
    Route::view('products/download', 'dashboard.products.download')->name('downloadProducts.index');
    Route::view('products/upload', 'dashboard.products.upload')->name('uploadProducts.index');
    Route::get('products/out-of-stock', [ProductController::class, 'outOfStock'])->name('product.outOfStock');
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
    Route::delete('notifications/{id}', [NotificationController::class, 'destroy'])->name('notification.destroy');

    // inDoor Routes
    Route::resource('rooms', RoomController::class);
    Route::resource('tables', TableController::class);

    // Places Routes
    Route::resource('cities', CityController::class);
    Route::resource('places', PlaceController::class);

    // Update Status
    Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('updateCategoryStatus');
    Route::post('update-product-status', [ProductController::class, 'updateProductStatus'])->name('updateProductStatus');
    Route::post('update-offer-status', [OfferController::class, 'updateStatus'])->name('updateOfferStatus');
});
// Auth Routes
Auth::routes(['register' => false]);
