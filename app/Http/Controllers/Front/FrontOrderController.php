<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class FrontOrderController extends Controller
{
    public function store(OrderRequest $request){
        // dd($request->all());
        $order = Order::create($request->all());
        if($order){
            toastr()->success('تم طلب المنتج بنجاح');
            return redirect()->route('front');
        }
    }
}
