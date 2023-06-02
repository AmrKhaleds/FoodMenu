<?php

namespace App\Actions;

use App\Models\Notification;

class NotificationCounterAction{
    public function index(){
        $notificationsCount = Notification::query()->where('is_read', true)->count();
        // return view
    }
}