<?php

use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\OrderTrackingController;
use App\Models\Offer;
use App\Models\Product;
use Carbon\Carbon;
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
Route::get('order-track', [OrderTrackingController::class, 'index'])->name('order-track.index');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout/delivery', [CheckoutController::class, 'deliveryOrder'])->name('checkout.delivery');
Route::post('checkout/restaurant', [CheckoutController::class, 'restaurantOrder'])->name('checkout.restaurant');

Route::get('/cartInfo', function () {
    $value = Session::get('guestIdentifier');
    $cart = \Cart::session($value);
    return ($cart->getContent());
});