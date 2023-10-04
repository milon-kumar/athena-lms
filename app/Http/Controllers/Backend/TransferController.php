<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\StudentMail;
use App\Models\Course;
use App\Models\Enrole;
use App\Models\User;
use App\Notifications\StudentMessageNotifiction;
use App\Notifications\StudentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class TransferController extends Controller
{
    public function transferStudent()
    {
        if (invalidPermission('Transfer.List')){
            return  redirect()->back();
        }

        $title ="Transfer List";
        $course = Course::findOrFail(courseId())->first();
        $users =  Enrole::with(['user'])->where('course_id',courseId())->get();
        return view('backend.admin.pages.transfer.index',compact('course','users','title'));
    }

    public function remove($id)
    {
        if (invalidPermission('Transfer.Remove')){
            return  redirect()->back();
        }
        $enrole =  Enrole::with(['payment'])->where('user_id',$id)->where('course_id',courseId())->first();
        if ($enrole->payment){
            $enrole->payment->delete();
        }
        $enrole->delete();

        toast("Student Removed From The Course",'success');
        return back();
    }

    public function suspend(Request $request)
    {
        if (invalidPermission('Transfer.SpendTime')){
            return  redirect()->back();
        }
        $enrole =  Enrole::with(['payment'])->where('user_id',$request->input('_id'))->where('course_id',courseId())->first();
        if ($enrole->is_suspend == true){
            $enrole->is_suspend = false;
        }else{
            $enrole->is_suspend = true;
        }
        $enrole->save();
        return $enrole;
    }

    public function communityPost(Request $request)
    {
        if (invalidPermission('Transfer.Community')){
            return  redirect()->back();
        }
        $enrole =  Enrole::where('user_id',$request->input('_id'))->where('course_id',courseId())->first();
        if ($enrole->is_post_approval == true){
            $enrole->is_post_approval = false;
        }else{
            $enrole->is_post_approval = true;
        }
        $enrole->save();
        return $enrole;
    }

    public function transfer($id)
    {
        if (invalidPermission('Transfer.Transfer')){
            return  redirect()->back();
        }
        $title = "Transfer Student From Course";
        $course = Course::findOrFail(courseId());
        $user =User::findOrFail($id);

        return view('backend.admin.pages.transfer.transfer',compact('title','course','user'));
    }

    public function transferStore(Request $request)
    {
        if (invalidPermission('Transfer.Transfer')){
            return  redirect()->back();
        }
        $enrole =  Enrole::where('user_id',$request->input('user_id'))->where('course_id',$request->input('perv_course_id'))->first();
        $enrole->update([
            'course_id'=>$request->input('course_id'),
            'date'=>now(),
        ]);
        toast('Course Transfer Successfully','success');
        return redirect()->route('admin.dashboard');
    }

    public function profile($id)
    {
        if (invalidPermission('Transfer.Profile')){
            return  redirect()->back();
        }
        $title = "Student Profile";
        $course = Course::findOrFail(courseId());
        $user = User::findOrFail($id);
        return view('backend.admin.pages.transfer.profile',compact('title','course','user'));
    }

    public function email($id)
    {
        if (invalidPermission('Transfer.Email')){
            return  redirect()->back();
        }

        $title = "Send Email";
        $course = Course::findOrFail(courseId());
        $user = User::findOrFail($id);
        return view('backend.admin.pages.transfer.email' ,compact('title','course','user'));
    }

    public function sendEmail(Request $request)
    {
         $this->validate($request,[
            'message'=>'required'
        ]);

        $message = $request->input('message');
        $user = User::findOrFail($request->input('user_id'));
        Mail::to($user)->queue(new StudentMail($message));

        toast('Mail Send Successfully','success');
        return redirect()->route('admin.transfer.student');
    }

    public function notification($id)
    {
        $title = "Send Notification Message";
        $user = User::findOrFail($id);
        $course = Course::findOrFail(courseId());

       return view('backend.admin.pages.transfer.notification',compact('title','user','course'));
    }

    public function sendNotification(Request $request)
    {
        $message = $request->input('message');
        $user = User::findOrFail($request->input('user_id'));
        $user->notify(new StudentNotification($message));

        toast('Notification Send Successfully','success');
        return redirect()->route('admin.transfer.student');
    }

    public function courseNotification()
    {
        if (invalidPermission('Push_Notification')){
            return  redirect()->back();
        }

        $title ="Push Notification";
        $course = Course::findOrFail(courseId())->first();
        $users =  Enrole::with(['user'])->where('course_id',courseId())->get();
        return view('backend.admin.pages.transfer.push_notification',compact('course','users','title'));
    }

    public function courseNotificationSend(Request $request)
    {
        if (invalidPermission('Push_Notification')){
            return  redirect()->back();
        }

        $message = $request->input('message');

        $users =  Enrole::with(['user'])->where('course_id',courseId())->get();
        foreach ($users as $user){
            $user->user->notify(new StudentNotification($message));
        }

        toast("Notification Send Successfully",'success');
        return back();
    }

}
