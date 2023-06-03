<?php

namespace App\Observers;

use App\Events\OrderNotificationEvent;
use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // Send Toaster After creating order
        toastr()->success('تم طلب المنتج بنجاح');
        // Send Realtime Notification After creating order
        event(new OrderNotificationEvent(
            $order->name,
            $order->email,
            url('/dashboard/orders/' . $order->id),
            $order->created_at,
        ));
        // Send Email To user with order deatils After creating order
        // Mail::to($order->email)->send(new OrderMail($order));
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
