<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileEdit($id)
    {
        $title = "Edit Profile Information";
        $user = User::findOrFail($id);
        //return view('backend.student.pages.profile.edit',compact('user'));
        return view('frontend.v2.pages.student.profile.edit',compact('title','user'));
    }

    public function profileUpdate(Request $request , $id = null)
    {


        $user = User::findOrFail($id);
        $user->update([
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'others_phone'=>$request->input('others_phone'),
            'father_name'=>$request->input('father_name'),
            'mother_name'=>$request->input('mother_name'),
            'thana'=>$request->input('thana'),
            'district'=>$request->input('district'),
            'institute'=>$request->input('institute'),
            'image'=>uploadImage($request,$user),
        ]);

        toast('Profile Updated Successfully........ :)','success');
        return redirect()->route('student.dashboard');

    }
}
