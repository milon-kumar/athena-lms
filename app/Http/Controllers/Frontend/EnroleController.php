<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrole;
use App\Models\FBGroupAccessCode;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mockery\Exception;

class EnroleController extends Controller
{
    public function enrole($slug)
    {

        $course = Course::where('slug',$slug)->first();
        if (auth()->user()){
            if (auth()->user()->type == 'super_admin' || auth()->user()->type == 'admin'){
                toast('Admin Don\'t Buy Any Course','warning');
                return  redirect()->back();
            }else{
                //return view('frontend.pages.enrole.enrole',compact('course_id'));
                $is_login = true;
                return view('frontend.v2.pages.course.enrole',compact('course','is_login'));
            }
        }else{
            $is_login = false;
            return view('frontend.v2.pages.course.enrole',compact('course','is_login'));
        }
    }

    public function storeEnrole(Request $request)
    {
        return redirect()->route('frontend.v2.proceedPayment');
        exit();
        DB::beginTransaction();
        try {
            $user = auth()->user();
            if ($user){
                if ($user->type == 'super_admin' || $user->type == 'admin' ){
                    toast('Admin doesn\'t buy any course');
                    return  redirect()->back();
                }
            }else{
                 $this->validate($request,[
                    'user_name'=>'required|unique:users',
                    'email'=>'required|string|email|max:255|unique:users',
                    'password'=>'required|confirmed',
                    'method'=>'required',
                    'name'=>'required|string|max:255',
                    'phone'=>['required','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
                    'image'=>'image|mimes:jpg,jpeg,png,webp',
                ],[
                    'number'=>'Your Phone Number Must 11 Deist',
                    'phone'=>'Your Phone Number Must 11 Deist',
                ]);

                $user = User::create([
                    'type'=>'student',
                    'unique_id'=>"st-".rand(111111,999999),
                    'ip_address'=>$request->ip(),
                    'user_name'=>$request->input('user_name'),
                    'email'=>$request->input('email'),
                    'password'=>Hash::make($request->input('password')),
                    'name'=>$request->input('name'),
                    'phone'=>$request->input('phone'),
                    'father_name'=>$request->input('father_name'),
                    'mother_name'=>$request->input('mother_name'),
                    'others_phone'=>$request->input('others_phone'),
                    'institute'=>$request->input('institute'),
                    'thana'=>$request->input('thana'),
                    'district'=>$request->input('district'),
                    'image'=>uploadImage($request),
                ]);
            }




             $payment = Payment::create([
                'unique_id'=>'Or-P-'.date('s').rand(11111,99999),
                'user_id'=>$user->id,
                'course_id'=>$request->input('course_id'),
                'method'=>$request->input('method'),
                'number'=>$request->input('number'),
                'transition_id'=>$request->input('transition_id'),
                'date'=>$request->input('date'),
                'status'=>'pending',
            ]);


            $enrole = Enrole::create([
                'unique_id'=>'Or-E-'.date('s').rand(11111,99999),
                'user_id'=>$user->id,
                'course_id'=>$request->input('course_id'),
                'payment_id'=>$payment->id,
                'status'=>'pending',
            ]);

            FBGroupAccessCode::create([
               'enrole_id'=>$enrole->id,
               'user_id'=>$user->id,
               'course_id'=> $request->input('course_id'),
                'code'=>$user->phone.Str::lower(Str::random(10)),
            ]);

            if ($user){
                Auth::login($user);
            }

            DB::commit();
            toast('Course Enrolled Success.Wait For Approval','success');
            return redirect()->route('student.dashboard');
            //return redirect()->route('frontend.complete-enrole',$enrole->id);
        }catch (Exception $exception){
            DB::rollBack();
            toast('Enrollment Failed....','error');
            return redirect()->back();
        }
    }

    public function proceedPayment()
    {
        $title = "Proceed Your Payment";
        return view("frontend.v2.pages.course.proceed_payment");
    }

    public function completeEnrole($id = null)
    {
        if (auth()->id()){
           return  $user = User::with(['courses'])->findOrFail(auth()->id());
            $enrole = Enrole::with(['course','payment'])->where('user_id',$user->id)->first();
            return view('frontend.pages.enrole.enrole_complete',compact('user','enrole'));
        }else{
            auth()->logout();
            toast('Access Denied','error');
            return redirect()->route('frontend.home');
        }
    }
}
