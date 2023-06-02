<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class FrontOrderController extends Controller
{
    public function __invoke(OrderRequest $request){
        $requestData = $request->all();
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $requestData['order_number'] = '#' . str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);;
        
        Order::create($requestData);

        toastr()->success('تم طلب المنتج بنجاح');
        return redirect()->route('front');
    }
}
