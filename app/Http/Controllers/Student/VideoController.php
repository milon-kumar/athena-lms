<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\LiveVideo;
use App\Models\UserVideo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function showVideo($id)
    {
        $title = "Video By All Chapters";
        $video = Video::with(['comments','chapter','course','userVideoHitCount'])->findOrFail($id);

        $viewVideoId = "course_video_session_key_".$video->id;

        if (!Session::has($viewVideoId)){
            UserVideo::create([
                'user_id'=>auth()->id(),
                'course_id'=>$video->course->id,
                'course_chapter_id'=>$video->chapter->id,
                'video_id'=>$video->id,
                'video_type'=>'course',
                'view_count'=>1,
            ]);
            Session::put($viewVideoId,true);
        }

//        if (!Session::has($viewKey)){
//            UserVideo::create([
//                'user_id'=>auth()->id(),
//                'course_id'=>$video->course->id,
//                'course_chapter_id'=>$video->chapter->id,
//                'video_id'=>$video->id,
//                'video_type'=>'course',
//                'view_count'=>1,
//            ]);
//        }

        $chapters =  CourseChapter::with(['videos','videos.userVideoHitCount'])->where('course_id',stdCourseId())->get();
        $course = Course::with('courseDetails')->findOrFail(stdCourseId(),['id','title']);

        //$chapters = CourseChapter::with(['videos:id,course_chapter_id,title,link,view_count'])->get(['id','user_id','course_id','name','slug']);
        //return view('backend.student.pages.course.show_video',compact('title','show_video','course','chapters'));

        return view('frontend.v2.pages.student.video.show_video',compact('title','course','video','chapters'));
    }

    public function videoCommentStore(Request $request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'course_id'=>courseId(),
            'commentable_id'=>$request->input('commentable_id'),
            'commentable_type'=>'App\\Models\\Video',
            'message'=>$request->input('message'),
            'image'=>$request->hasFile('image') ? $request->file('image')->store('/images', ['disk' =>'my_files']) : '',
        ]);

        toast('Comment Posted Successfully','success');
        return redirect()->back();
    }

    public function videoCommentStoreReplay(Request $request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'course_id'=>courseId(),
            'comment_id'=>$request->input('commentId'),
            'commentable_id'=>$request->input('commentable_id'),
            'commentable_type'=>'App\\Models\\Video',
            'is_replay'=>true,
            'message'=>$request->input('message'),
            'image'=>$request->hasFile('image') ? $request->file('image')->store('/images', ['disk' =>'my_files']) : '',
        ]);
        toast('Replay Posted Successfully','success');
        return redirect()->back();
    }

    public function liveVideo()
    {
        $title = "Live Video";
        $course = Course::with(['courseDetails:id,course_id,video_view_permit'])->findOrFail(stdCourseId());
        $videos = LiveVideo::with(['course','userHitCount'])->where('course_id',stdCourseId())->orderBy('serial','asc')->paginate(10);
        return view('frontend.v2.pages.student.video.live_video',compact('title','course','videos'));
    }

    public function singleLiveVideo($id)
    {
        $title = "Live Video";
        $course = Course::findOrFail(stdCourseId());
        $video = LiveVideo::findOrFail($id);
        $videos = LiveVideo::with(['userHitCount'])->orderBy('serial','asc')->get();

        $viewVideoId = "live_video_session_key_".$video->id;

        if (!Session::has($viewVideoId)){
            UserVideo::create([
                'user_id'=>auth()->id(),
                'course_id'=>stdCourseId(),
                'live_video_id'=>$video->id,
                'video_type'=>'live',
                'view_count'=>1,
            ]);
            Session::put($viewVideoId,true);
        }
        return view('frontend.v2.pages.student.video.show_live_video',compact('title','course','video','videos'));
    }
}
