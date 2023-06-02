<?php

namespace App\Listeners;

use App\Events\OrderNotificationEvent;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationListener
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
    public function handle(OrderNotificationEvent $event): void
    {
        Notification::create([
            'title' => $event->title,
            'message' => $event->message,
            'link' => $event->link,
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now()
        ]);
    }
}
