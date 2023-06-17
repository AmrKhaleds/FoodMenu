<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\FrontOrderController;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::view('/', 'front.index')->name('front');
Route::post('order', FrontOrderController::class)->name('request-order');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout/delivery', [CheckoutController::class, 'deliveryOrder'])->name('checkout.delivery');
Route::post('checkout/restaurant', [CheckoutController::class, 'restaurantOrder'])->name('checkout.restaurant');



// Route::get('/clear', function(){
//     $value = Session::get('guestIdentifier');
//     $cart = \Cart::session($value);
//     $cart->clear();
// });
Route::get('/cartInfo', function(){
    $value = Session::get('guestIdentifier');
    $cart = \Cart::session($value);
    // \Cart::session($value)->update(3,[
    //     'quantity' => 3,
    // ]);
    return ($cart->getContent());
});
