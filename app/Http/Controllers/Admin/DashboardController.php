<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $orders = Order::select('name', 'menu', 'oredr_number')->get();
        dd($orders);
        return view('dashboard.index', compact('orders'));
    }
}
