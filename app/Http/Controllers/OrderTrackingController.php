<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    public function index(Request $request)
    {
        $trackingNumber = $request->query('order_tracking_number');
        return view('front.order-track', compact('trackingNumber'));
    }
}
