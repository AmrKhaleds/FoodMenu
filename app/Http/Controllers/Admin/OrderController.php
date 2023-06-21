<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.orders.index');
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
        $order = Order::with('orderDetail')->find($id);
        $products = [];
        // $totalPrice = 0;
        foreach($order->orderDetail as $menuItem){
            $products[] = [
                'name' => $menuItem->product_name,
                'price' => $menuItem->product_price,
                'quantity' => $menuItem->product_quantity,
            ];
        }
        return view('dashboard.orders.show', compact('order', 'products'));
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
            toast('تم حذف الطلب بنجاح', 'success');
            return redirect()->route('orders.index');
        }
    }

    public function updateOrderStatus(Request $request){
        $requestData = $request->all();
        $order = Order::findOrFail($requestData['order_id']);

        if (!$order) {
            return response()->json([
                'status' => false,
                'msg' => 'Order not found',
            ]);
        }
        // update status on change
        $order->status = $requestData['status'];
        $order->save();
    
        $message = $requestData['status'] == 1 ? 'تم إكمال الطلب بنجاح' : 'لم يتم إكمال الطلب بنجاح';

        return response()->json([
            'status' => true,
            'msg' => $message,
        ]);
    }
}
