<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class FrontOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $value = Session::get('guestIdentifier');
        $cart = \Cart::session($value)->getContent();
        dd($cart);
        try {
            $requestData = $request->all();

            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            $requestData['order_number'] = 'INV_' . date('Y') . "_" . str_pad($latestOrder + 1, 5, "0", STR_PAD_LEFT);



            Order::create($requestData);

            $value = Session::get('guestIdentifier');
            $cart = \Cart::session($value);
            $cart->clear();
            

            foreach($requestData['products'] as $productID){
                $product = Product::findOrFail($productID);
                
                // dd($product);
            }
            toast('تم الطلب بنجاح','success')->position('top-end');
            return redirect()->route('front');
        } catch (\Exception $e) {
            toast('حدث خطأ أثناء طلب المنتج. الرجاء المحاولة مرة أخرى.','error')->position('top-end');
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
    
}
