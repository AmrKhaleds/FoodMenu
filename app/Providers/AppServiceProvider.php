<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Validator;

use App\Models\Notification;
use App\Models\Order;
use App\Observers\OrderObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
        $notificationCount = Notification::where('is_read', false)->count();
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        View::share(['notifications' => $notifications, 'notificationCount' => $notificationCount]);

        Order::observe(OrderObserver::class);
    }
}
