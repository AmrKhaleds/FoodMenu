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
        $notificationCount = Notification::where('is_read', false)->count();
        $notifications = Notification::orderBy('created_at', 'desc')->limit(30)->get();
        
        View::share(['notifications' => $notifications, 'notificationCount' => $notificationCount, 'settings' => $generalSettings->getAllSettings()]);
    }
}
