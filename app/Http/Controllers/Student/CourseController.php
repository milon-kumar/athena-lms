<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Enrole;
use App\Models\Pdf;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function courses()
    {
        $title = "My Course";

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
        });


        $user->approvedCourses[0] ?? null;
        //return view('backend.student.pages.course.all_course',compact('title','user'));
        return view('frontend.v2.pages.student.course.my_course',compact('title','user'));
    }

    public function courseDetails($slug)
    {
        $course = Course::with(['courseDetails','chapters','videos','chapters.videos'])->where('slug',$slug)->first();
        return view('backend.student.pages.course.course_details',compact('course'));
    }

    public function classVideo($slug)
    {
        $chapter = CourseChapter::with(['videos'])->where('slug',$slug)->first();
        return view('backend.student.pages.course.all_videos',compact('chapter'));
    }

    public function buyCourse()
    {
        $user = User::with('courses')->findOrFail(Auth::id());
        $enroled = $user->courses->pluck('id');
        $courses =  Course::where('status', 'published')->whereNotIn('id', $enroled)->paginate(12);

        //return view('backend.student.pages.course.buy_course',compact('courses'));
        return view('frontend.v2.pages.student.course.buy_course',compact('courses'));
    }

    public function buyCourseDetails($slug)
    {
        return Course::with(['courseDetails'])->where('slug',$slug)->first();
    }

    public function chapter()
    {
        $title = "All Video By Chapter";
        $course = Course::with(['courseDetails:id,course_id,video_view_permit','chapters','videos'])->findOrFail(stdCourseId());
        $chapters =  CourseChapter::with(['videos','videos.userVideoHitCount'])->where('course_id',stdCourseId())->get();
        //return view('backend.student.pages.course.chapters',compact('title','course','chapters'));
        return view('frontend.v2.pages.student.video.course_video',compact('title','course','chapters'));
    }

    public function pdf($type = null)
    {
        $pdfs = Pdf::where('course_id',stdCourseId())->where('type',$type)->paginate(20);
        //return view('backend.student.pages.course.pdf.all_pdf',compact('pdfs','type'));
        return view('frontend.v2.pages.student.pdfs.all_pdf',compact('pdfs','type'));
    }

    public function pdfShow($id = null)
    {
        $pdf = Pdf::findOrFail($id);
        //return view('backend.student.pages.course.pdf.show_pdf',compact('pdf'));
        return view('frontend.v2.pages.student.pdfs.show_pdf',compact('pdf'));
    }
}
