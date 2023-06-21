<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ProductStatus extends Component
{
    public $changeStatus;



    public function render()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('livewire.product-status', compact('orders'));
    }
}
