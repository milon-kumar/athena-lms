<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Course;
use App\Models\CourseDetails;
use App\Models\Faq;
use App\Models\Opinion;
use App\Models\Slider;
use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeContoller extends Controller
{
    public function home()
    {
        $title = "Home";
        $categories = Category::with(['publishedCourses','publishedCourses.courseDetails'])->get();
        $available_course = Course::where('status','published')->latest()->take(10)->get(['id','slug','title','image']);
        $teachers = Teacher::where('status',1)->get();
        $sliders = Slider::where('status','published')->orderBy('serial','ASC')->get();
        $opinions = Opinion::latest()->get();


        return view('frontend.v2.pages.home.home',compact('title','sliders','categories','available_course','teachers','opinions'));
    }

    public function allCourse($all)
    {
        if ($all == 'all'){
            $courses = Course::latest()->paginate(20);
        }else{
            $category = Category::where('slug',$all)->first(["id"])->id;
            $courses = Course::where('category_id',$category)->latest()->paginate(20);
        }
        $title = "All Category Course";
        $categories = Category::latest()->limit(10)->get(['id','name','slug']);

        return view('frontend.v2.pages.course.category_course',compact('title','categories','courses'));
    }

    public function details($slug)
    {
         $course = Course::with(['courseDetails','category','chapters'=>function($query){
            return $query->orderBy('serial','ASC');
        },'chapters.videos'=>function($query){
             return $query->orderBy('serial','ASC');
         },'videos','users'])->where('slug',$slug)->first();
        $title = "Details - ".$course->title;

        $total_enrols = $course->courseDetails->total_course_students + $course->users->count();
        $course->update([
            'view_count' => $course->view_count + 1,
        ]);
        $shearOptions = \Share::page(url('details/'.$slug))
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->link()
            ->getRawLinks();


        $related_courses = Course::where('category_id',$course->category->id)->where('status','published')->whereNotIn('id',[$course->id])->inRandomOrder()->limit(4)->get();
        //return view('frontend.pages.course.details',compact('title','course','related_courses'));
        return view('frontend.v2.pages.course.details',compact('title','course','total_enrols','related_courses','shearOptions'));
    }

    public function video($id , $slug)
    {
        $title = "Show Video";
        $course = Course::with(['courseDetails','category','chapters'=>function($query){
            return $query->orderBy('serial','ASC');
        },'chapters.videos'=>function($query){
            return $query->orderBy('serial','ASC');
        },'videos','users'])->where('slug',$slug)->first();

        $video = Video::findOrFail($id);

        return view('frontend.v2.pages.course.show_video',compact('title','course','video'));
    }

    public function applyCopon(Request $request)
    {
        return $request;
    }

    public function instructors()
    {
        $title = "All Instructors";
        $teachers = Teacher::where('status','published')->paginate(20);
        return view('frontend.v2.pages.instructor.instructor',compact('title','teachers'));
    }

    public function ourServices()
    {
        $title = "Our Services";
        return view('frontend.v2.pages.footer.our_services',compact('title'));
    }
    public function refundPolicy()
    {
        $title = "Refund Policy";
        return view('frontend.v2.pages.footer.refund_policy',compact('title'));
    }
    public function privacyPolicy()
    {
        $title = "Privacy Policy";
        return view('frontend.v2.pages.footer.privacy_policy',compact('title'));
    }
    public function rules()
    {
        $title = "Rules";
        return view('frontend.v2.pages.footer.rules',compact('title'));
    }
    public function community()
    {
        $title = "Community";
        return view('frontend.v2.pages.footer.community',compact('title'));
    }

    public function disclaimer()
    {
        $title = "Disclaimer";
        return view('frontend.v2.pages.footer.disclaimer',compact('title'));
    }

    public function noticeBoard()
    {
        $title = "Notice Board";
        return view('frontend.v2.pages.footer.notice_board',compact('title'));
    }

    public function joinAsTeacher()
    {
        $title = "Join As A Teacher";
        return view('frontend.v2.pages.footer.join_as_teacher',compact('title'));
    }

    public function carrier()
    {
        $title = "Carrier";
        return view('frontend.v2.pages.footer.carrier',compact('title'));
    }

    public function dropCv()
    {
        $title = "Drop CV";
        return view('frontend.v2.pages.footer.drop_cv',compact('title'));
    }

    public function contact()
    {
        $title = "Contact us";
        return view('frontend.v2.pages.contract.contract',compact('title'));
    }
    public function contactMessage(Request $request)
    {
        Contact::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'message'=>$request->input('message'),
        ]);

        toast('Message Send Success','success');
        return back();
    }

    public function faq()
    {
        $title = "Frequently Asked Questions";
        $faqs = Faq::latest()->get();
        return view('frontend.v2.pages.footer.faq',compact('title','faqs'));
    }
}
