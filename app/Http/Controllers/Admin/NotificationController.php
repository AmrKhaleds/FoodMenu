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

    public function destroy(string $id)
    {
        $notification = Notification::findOrFail($id);
        if(!$notification)
        {
            toast('لا يوجد اشعار بهذا الأسم', 'error');
            return redirect()->route('notification.index');
        }
        $notification->delete();
        toast('تم حذف الإشعار بنجاح', 'success');
        return redirect()->route('notification.index');
    }
}
