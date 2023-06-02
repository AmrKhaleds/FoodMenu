<?php

namespace App\Providers;

use App\Models\Notification;
use App\Settings\GeneralSettings;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $generalSettings = app(GeneralSettings::class);
        View::share('settings', $generalSettings->getAllSettings());
        // Using closure based composers...
        View::composer('*', function ($view) {
            if (auth()->check()) {
                // The user is logged in...
                $notificationCount = Notification::where('is_read', false)->count();
                $notifications = Notification::orderBy('created_at', 'desc')->get();
                $view->with(['notifications' => $notifications, 'notificationCount' => $notificationCount]);
            }
        });
    }
}
