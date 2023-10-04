<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function all()
    {
        $title = "All Notifications";
        $notifications = auth()->user()->notifications;
        return view('frontend.v2.pages.student.notification.all_notification',compact('title','notifications'));
        //return view('backend.student.pages.notifications.all',compact('title','notifications'));
    }
    public function read($id)
    {
        if (auth()->user()){
            $notification = auth()->user()->notifications->where('id',$id)->first();
            $notification->markAsRead();

            toast('Read Notification Success','success');
            return back();
        }
    }

    public function unseen()
    {
        $title = "Unread Notifications";
        $notifications = auth()->user()->notifications->whereNull('read_at');
        return view('backend.student.pages.notifications.unseen',compact('title','notifications'));
    }
    public function seen()
    {
        $title = "Read Notifications";
        $notifications = auth()->user()->notifications->whereNotNull('read_at');
        return view('backend.student.pages.notifications.seen',compact('title','notifications'));
    }
}
