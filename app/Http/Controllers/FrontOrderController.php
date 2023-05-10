<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class FrontOrderController extends Controller
{
    public function store(OrderRequest $request){
        // dd($request->all());
        $order = Order::create($request->all());
        if($order){
            return redirect()->route('front')->with(['success' => 'تم الطلب بنجاح يرجى انتظار مكلمة من خدمة العملاء']);
        }
    }
}
