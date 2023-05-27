<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        $products = [];
        $totalPrice = 0;
        foreach($order->menu as $menuItem){
            $getProduct = Product::find($menuItem);
            $price = $getProduct->price;
            $totalPrice += $price;
            $products[] = [
                'name' => $getProduct->name,
                'desc' => $getProduct->desc,
                'price' => $price
            ];
        }
        return view('dashboard.orders.show', compact('order', 'products', 'totalPrice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if($order->delete()){
            toastr()->success('تم حذف الطلب بنجاح');
            return redirect()->route('orders.index');
        }
    }
}
