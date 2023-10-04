<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Enrole;
use App\Models\FBGroupAccessCode;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrolmentController extends Controller
{
    public function enrole()
    {
       //return  $enrols = Enrole::where('status','pending')->get();

        $enrols = Enrole::with(['user','payment','course'])->where('status','pending')->get();
        return view('backend.admin.pages.enrole.index',compact('enrols'));
    }

    public function enroleApprove($id)
    {
         $enrole = Enrole::findOrFail($id);
         $payment = Payment::findOrFail($enrole->payment_id);
         $user = User::findOrFail($enrole->user_id);
         $code = FBGroupAccessCode::where('enrole_id',$enrole->id)->where('user_id',$user->id)->first();

         $enrole->update([
            'status'=>'approve'
         ]);

         $payment->update([
            'status'=>'approve',
         ]);

         $user->update([
            'is_approve'=>true,
         ]);

        $code->update([
           'status'=>'published',
        ]);

        toast('Course Approve Success... :)','success');
        return redirect()->route('admin.enrole.approve');
    }

    public function enroleDecline($id)
    {
        $enrole = Enrole::findOrFail($id);
        $payment = Payment::findOrFail($enrole->payment_id);
        $enrole->update([
            'status'=>'decline'
        ]);

        $payment->update([
            'status'=>'decline',
        ]);

        toast('Course Declined... :(','success');
        return redirect()->route('admin.enrole.approve');
    }
}
