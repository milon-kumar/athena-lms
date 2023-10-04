<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function settingAccount()
    {
        $rand_code = rand(00000,99999);
        return view('backend.student.pages.profile.account',compact('rand_code'));
    }

    public function changeEmail(Request $request)
    {
        $this->validate($request,[
           'old_email'=>'required|email',
           'new_email'=>'required|email',
           'password'=>'required',
        ]);
        $old_email = $request->input('old_email');
        $new_email = $request->input('new_email');
        $password = $request->input('password');
        if ($old_email == $new_email ){
            toast('Email Address Same.......','warning');
            return redirect()->back();
        }else{
            $user = User::where('email',$old_email)->first();
            if ($user){
                if (Hash::check($password,$user->password)){
                    $user->update([
                        'email'=>$new_email,
                    ]);
                    toast('Email Address Change Successfully.......','success');
                    return redirect()->route('student.dashboard');
                }else{
                    toast('Password Dont Match.......','warning');
                    return redirect()->back();
                }
            }else{
                toast('Email Address Dont Match.......','warning');
                return redirect()->back();
            }
        }
    }

    public function changePassword(Request $request)
    {
        if (Hash::check($request->input('old_password') , auth()->user()->password)){
            $user = User::findOrFail(auth()->id());
            $user->update([
                'password'=>Hash::make($request->input('new_password')),
            ]);
            toast('Password Change Successfully......','error');
            Auth::logout();
            return redirect()->route('frontend.home');
        }else{
            toast('Old Password Doesn\'t match!','error');
            return redirect()->back();
        }
    }
}
