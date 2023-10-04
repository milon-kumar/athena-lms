<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChapterExam;
use App\Models\Comment;
use App\Models\Complain;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseDetails;
use App\Models\CourseFeture;
use App\Models\Pdf;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function Symfony\Component\String\Slugger\slug;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return true;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Course.Create')){
            return redirect()->back();
        }
        $title = "Create A New Course";
        return view('backend.admin.pages.course.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'category_id'=>'required|integer',
            'regular_course_fee'=>'required|integer',
        ]);


        Course::create([
            'user_id'=>auth()->id(),
            'title'=>$request->input('title'),
            'category_id'=>$request->input('category_id'),
            'slug'=>Str::slug($request->input('title')),
            'image'=>uploadImage($request),
            'is_popular'=>$request->filled('is_popular'),
            'regular_course_fee'=>$request->input('regular_course_fee'),
            'discount_fee'=>$request->input('discount_fee') ?? 0 ,
            'full_course_fee'=>discournPrice($request),
            'status'=>'pending',
        ]);
        toast('Course Create Successfully ... :)','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('backend.admin.pages.course.show',compact('course'));
    }

    public function previewCourse()
    {
        $slug =  Course::findOrFail(courseId(),['id','slug'])->slug;

        return redirect()->route('frontend.v2.details',$slug);


        $course = Course::with(['courseDetails','category','chapters'=>function($query){
            return $query->orderBy('serial','DESC');
        },'chapters.videos','videos'])->findOrFail(courseId());
        if ($course->courseDetails){
            return view('backend.admin.pages.course.preview',compact('course'));
        }else{
            toast('First Create Course Details First.....','warning');
            return  redirect()->back();
        }

    }

    public function edit(Course $course)
    {
       return $course;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        return $course;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
       return $course;
    }

    public function editCourse(){
        return view('backend.admin.pages.course.edit_content');
    }

    public function published()
    {
        $course =  Course::findOrFail(courseId());
        $course->update([
           'status'=>'published',
        ]);
        toast('congratulation !!! Your Course Published Successfully 	👏	👏	👏....','success');
        return redirect()->route('admin.dashboard');
    }
    public function disable()
    {
        $course =  Course::findOrFail(courseId());
        $course->update([
            'status'=>'disable',
        ]);

        toast('Your Course Disable Successfully...','success');
        return redirect()->route('admin.dashboard');
    }

    public function courseCopy()
    {
        $course =  Course::with(['courseDetails','chapters','chapters.videos','chapters.exams','pdfs'])->findOrFail(courseId());

        DB::beginTransaction();

        try {
            if ($course){
                $copy_course = Course::create([
                    'user_id'=>Auth::id(),
                    'category_id'=>$course->category_id,
                    'title'=>$course->title,
                    'slug'=>Str::slug($course->title),
                    'image'=>$course->image ?? defaultImage(),
                    'regular_course_fee'=>$course->regular_course_fee,
                    'discount_fee'=>$course->discount_fee ?? 0 ,
                    'full_course_fee'=>($course->regular_course_fee) - ($course->discount_fee),
                    'is_copy'=>true,
                    'status'=>'pending',
                ]);

                if ($course->pdfs){
                    foreach ($course->pdfs as $pdf){
                        Pdf::create(    [
                            'user_id'=>Auth::id(),
                            'course_id'=>$copy_course->id,
                            'type' =>$pdf->type,
                            'title'=>$pdf->title,
                            'serial'=>$pdf->serial,
                            'pdf'=>$pdf->pdf,
                        ]);
                    }
                }
            }

            if ($course->courseDetails){
                $copy_course_details = CourseDetails::create([
                    'user_id'=>Auth::id(),
                    'course_id'=>$copy_course->id,
                    'image'=>$course->courseDetails->image ?? defaultImage(),
                    'total_course_students'=>$course->courseDetails->total_course_students,
                    'recorded_class_video'=>$course->courseDetails->recorded_class_video,
                    'live_classes'=>$course->courseDetails->live_classes,
                    'live_class_time'=>$course->courseDetails->live_class_time,
                    'total_class_hours'=>$course->courseDetails->total_class_hours,
                    'mcq_exams'=>$course->courseDetails->mcq_exams,
                    'weekly_exams'=>$course->courseDetails->weekly_exams,
                    'paper_final_exams'=>$course->courseDetails->paper_final_exams,
                    'class_recorded'=>$course->courseDetails->class_recorded,
                    'live_class_method'=>$course->courseDetails->live_class_method,
                    'course_buy_video'=>$course->courseDetails->course_buy_video,
                    'course_description'=>$course->courseDetails->course_description,
                    'teachers'=>$course->courseDetails->teachers,
                    'fb_private_discussion_group'=>$course->courseDetails->fb_private_discussion_group,
                    'course_introduction_video'=>$course->courseDetails->course_introduction_video,
                    'enrollment_validity'=>$course->courseDetails->enrollment_validity,
                    'video_view_permit'=>$course->courseDetails->video_view_permit,
                ]);
            }

            if ($course->chapters){
                foreach ($course->chapters as $chapter){
                    $copy_course_chapter = CourseChapter::create([
                        'user_id'=>Auth::id(),
                        'course_id'=>$copy_course->id,
                        'name'=>$chapter->name,
                        'slug'=>Str::slug($chapter->name),
                        'serial'=>$chapter->serial,
                        'is_free'=>$chapter->is_free
                    ]);

                    if ($chapter->videos){
                        foreach ($chapter->videos as $video ){
                            Video::create([
                                'user_id'=>Auth::id(),
                                'course_id'=>$copy_course->id,
                                'course_chapter_id'=>$copy_course_chapter->id,
                                'serial'=>$video->serial,
                                'duration'=>$video->duration,
                                'title'=>$video->title,
                                'slug'=>Str::slug($video->title),
                                'link'=>$video->link,
                                'is_free'=>$video->is_free,
                            ]);
                        }
                    }

                    if ($chapter->exams){
                        foreach ($chapter->exams as $exam ){
                            ChapterExam::create([
                                'user_id'=>Auth::id(),
                                'course_id'=>$copy_course->id,
                                'course_chapter_id'=>$copy_course_chapter->id,
                                'title'=>$exam->title,
                                'slug'=>Str::slug($exam->title),
                                'exam_link'=>$exam->exam_link,
                                'is_free'=>$exam->is_free,
                                'serial'=>$exam->serial,
                            ]);
                        }
                    }
                }
            }

            DB::commit();

            toast('Course Copy Success....','success');
            return redirect()->route('admin.dashboard');

        }catch (\Exception $e){
            DB::rollBack();
            toast("Something went wrong . Course copy failed.....!!!",'error');
            return redirect()->back();
        }
    }

    public function courseDelete()
    {
        $course = Course::findOrFail(courseId());
        $course_details = CourseDetails::where('course_id',$course->id)->first();
        $chapters = CourseChapter::where('course_id',$course->id)->get();
        $videos = Video::where('course_id',$course->id)->get();
        $pdfs = Pdf::where('course_id',$course->id)->get();
        $posts = Post::where('course_id',$course->id)->get();
        $complains = Complain::where('course_id',$course->id)->get();
        $comments = Comment::where('course_id',$course->id)->get();
        if ($course_details){
            $course_details->delete();
        }
        if ($chapters){
            foreach ($chapters as $chapter){
                $chapter->delete();
            }
        }
        if ($videos){
            foreach ($videos as $video){
                $video->delete();
            }
        }
        if ($pdfs){
            foreach ($pdfs as $pdf){
                if ($pdf->pdf){
                    @unlink($pdf->pdf);
                }
                $pdf->delete();
            }
        }
        if ($posts){
            foreach ($posts as $post){
                $post->delete();
            }
        }
        if ($complains){
            foreach ($complains as $complain){
                $complain->delete();
            }
        }
        if ($comments){
            foreach ($comments  as $comment){
                $comment->delete();
            }
        }
        if ($course){
            $course->delete();
        }

        toast('Course Deleted Successfully.........','success');
        return redirect()->route('admin.dashboard');
    }
}
