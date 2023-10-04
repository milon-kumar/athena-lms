<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function Nette\Utils\isEmpty;
use function PHPUnit\Framework\isNull;

class DashboardController extends Controller
{
    public function setStudentCourseId($id)
    {

        $user = Auth::user();
        $course = $user->courses->where('id', $id)->first();

        $date = Carbon::parse($course->pivot->date);
        $result = $date->addMonths($course->courseDetails->enrollment_validity)->toDateString();
        $now = now()->format('Y-m-d');
        if ($result <= $now) {
            $course->deactive = true;
            $user->selected_course_id = null;
            $user->update();
            toast('Your course validity is expired', 'warning');
        }else{
            $user->selected_course_id = $course->id;
            $user->save();
            toast("Change Course Successfully",'success');
        }
        return back();
    }

    public function dashboard()
    {
//        $user = Auth::user();
//        $course = $user->approvedCourses->first();
//        if($course?->pivot->is_suspend){
//            $user->selected_course_id = null;
//            $user->update();
//            toast("You suspend from the ". $course->title ." course for some days. contact administrator!",'warning');
//            return view('backend.student.pages.dashboard.dashboard',compact('user'));
//        }else{
//            if (!$user->selected_course_id){
//                $date = Carbon::parse($course?->pivot->date);
//                $result = $date->addMonths($course?->courseDetails->enrollment_validity)->toDateString();
//                $now = now()->format('Y-m-d');
//                if ($result <= $now) {
//                    optional($course)->deactive = true;
//                    $user->selected_course_id = null;
//                    $user->update();
//                    toast('Your first course validity is expired', 'warning');
//                }else{
//                    $user->selected_course_id = $course->id;
//                    $user->update();
//                }
//            }
//        }


        //return view('backend.student.pages.dashboard.dashboard',compact('user'));
        $user = Auth::user();

        $title = "My Dashboard";

        $user = User::with('approvedCourses', 'approvedCourses.courseDetails:id,course_id,enrollment_validity')->findOrFail(Auth::id());


        $user->approvedCourses->map(function ($item) {
            $date = Carbon::parse($item->pivot->date);
            $result = $date->addMonths($item->courseDetails->enrollment_validity)->toDateString();
            $now = now()->format('Y-m-d');

            if($result <= $now) {
                $item->deactive = true;
                $user = User::where('id', Auth::id())->first();
                $user->selected_course_id = NULL;
                $user->save();
            }else{
                $item->deactive = false;
            }
            $targetDate = \Carbon\Carbon::parse('2023-10-01');
            $today = \Carbon\Carbon::today();
            $remainingDays = $today->diffInDays($targetDate);
            $item->remaning = $remainingDays;
            return $item;
        });


        $user->approvedCourses[0] ?? null;
        //return view('backend.student.pages.course.all_course',compact('title','user'));



        if ($user){
            if ($user->is_approve){
                return view('frontend.v2.pages.student.dashboard.approve_dashboard',compact('user'));
            }else{
                return view('frontend.v2.pages.student.dashboard.not_approve_dashboard',compact('user'));
            }
        }else{
            toast('Access Denied','error');
            return redirect()->route('frontend.v2.home');
        }

    }
}
