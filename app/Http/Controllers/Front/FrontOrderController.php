<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class FrontOrderController extends Controller
{
    public function __invoke(OrderRequest $request)
    {
        try {
            $requestData = $request->all();
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            $orderNumber = '#' . str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
            $requestData['order_number'] = $orderNumber;

            Order::create($requestData);
    
            $value = Session::get('guestIdentifier');
            $cart = \Cart::session($value);
            $cart->clear();
    
            return redirect()->route('front');
        } catch (\Exception $e) {
            toastr()->error('حدث خطأ أثناء طلب المنتج. الرجاء المحاولة مرة أخرى.');
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
    
}
