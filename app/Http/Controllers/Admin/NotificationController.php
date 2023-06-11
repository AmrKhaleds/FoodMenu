<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    public function index(){
        return view('dashboard.notifications.index');
    }
}
