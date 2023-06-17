<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::with('orderDetail')->where('order_status', 'complete')->orderBy('created_at', 'desc')->get();
        $total = Order::where('order_status', 'complete')->sum('order_amount');
        // dd($orders);
        return view('dashboard.index', compact('orders', 'total'));
    }
}
