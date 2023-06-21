<?php

namespace App\Listeners;

use App\Events\OutOfStockEvent;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OutOfStockListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OutOfStockEvent $event): void
    {
        Notification::create([
            'title' => 'نفاذ كمية منتج',
            'message' => 'عدد المنتجات : ' . $event->products,
            'link' => $event->link,
            'created_at' => $event->created_at,
        ]);
    }
}
