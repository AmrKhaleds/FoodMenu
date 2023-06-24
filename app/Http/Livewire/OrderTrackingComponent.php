<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderTrackingComponent extends Component
{
    public $order_tracking_number, 
            $orderStatus, 
            $trackingNumber, 
            $statusPresentage, 
            $statusColor;
    public bool $error = false;
    protected $rules = [
        'order_tracking_number' => 'required|numeric',
    ];

    public function mount($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        $this->order_tracking_number = $trackingNumber;
    }
    

    public function search()
    {
        sleep(1);
        $this->validate();
        $order = Order::where('order_traking_number', $this->order_tracking_number)->first();

        if(!$order){
            $this->orderStatus = 'رقم تتبع غير صحيح';
            $this->error = true;
        }else{
            $this->error = false;            
            switch($order->order_status)
            {
                case 'pending':
                    $this->orderStatus = 'قيد انتظار الموافقة عل الطلب';
                    $this->statusPresentage = 25;
                    $this->statusColor = '#FF4961 !important';
                    break;
                case 'Preparaition':
                    $this->orderStatus = 'قيد التحضير';
                    $this->statusPresentage = 50;
                    $this->statusColor = '#1E9FF2 !important';
                    break;
                case 'delivary':
                    $this->orderStatus = 'قيد الشحن';
                    $this->statusPresentage = 75;
                    $this->statusColor = '#FF9149 !important';
                    break;
                case 'complete':
                    $this->orderStatus = 'اكتمل الطلب';
                    $this->statusPresentage = 100;
                    $this->statusColor = '#28D094 !important';
                    break;
                default:
                    $this->orderStatus = 'تم إلغاء الطلب';
                    $this->statusPresentage = 100;
                    $this->statusColor = 'red !important';
            }
        }

    }
    
    public function render()
    {
        return view('livewire.order-tracking-component');
    }
}
