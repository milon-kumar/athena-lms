<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VideoController extends Controller
{


    public function videoIndex($id)
    {
        if (invalidPermission('Video.List')){
            return redirect()->back();
        }
        $title = "All Videos";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($id,['id','name']);
        $videos = Video::where('course_chapter_id',$chapter->id)->get();
        return view('backend.admin.pages.video.index',compact('title','course','chapter','videos'));
    }

    public function videoCreate($id)
    {
        if (invalidPermission('Video.Create')){
            return redirect()->back();
        }
        $title = "Create Videos";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($id,['id','name']);
        return view('backend.admin.pages.video.create',compact('title','course','chapter'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (invalidPermission('Video.Create')){
            return redirect()->back();
        }

        $serials =  $request->input('serials');

        foreach ($serials as $key => $serial) {
            if (!empty($request->input('is_frees')[$key])){
                $is_free = 1;
            }else{
                $is_free = 0;
            }

             Video::create([
                'user_id'=>Auth::id(),
                'course_id'=>courseId(),
                'course_chapter_id'=>$request->input('chapter_id'),
                'title'=>$request->input('titles')[$key],
                'slug'=>Str::slug($request->input('titles')[$key]),
                'link'=>$request->input('links')[$key],
                'is_free'=>$is_free,
                'serial'=>$request->input('serials')[$key],
                'duration'=>$request->input('durations')[$key],
            ]);
        }

        toast('Video Create Successfully...','success');
        return redirect()->route('admin.video-index',$request->input('chapter_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        return $video;
    }

    public function videoShow($id,$chapter_id)
    {
        if (invalidPermission('Video.Show')){
            return redirect()->back();
        }
        $title = "Show Video";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($chapter_id,['id','name']);
        $video = Video::with(['comments'=>function($q) {
            $q->orderBy('created_at','DESC');
    },'comments.user:id,name,image','comments.replayComments','comments.replayComments.user:id,name,image'])->findOrFail($id);
        return view('backend.admin.pages.video.show',compact('title','course','chapter','video'));
    }

    public function videoEdit($id,$chapter_id = null)
    {
        if (invalidPermission('Video.Edit')){
            return redirect()->back();
        }
        $title = "Edit Videos";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($chapter_id,['id','name']);
        $video = Video::findOrFail($id);
        return view('backend.admin.pages.video.edit',compact('title','course','chapter','video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        if (invalidPermission('Video.Edit')){
            return redirect()->back();
        }

        $video->update([
            'user_id'=>auth()->id(),
            'course_id'=>courseId(),
            'course_chapter_id'=>$video->course_chapter_id,
            'serial'=>$request->input('serial'),
            'duration'=>$request->input('duration'),
            'title'=>$request->input('title'),
            'slug'=>Str::slug($request->input('video_title')),
            'link'=>$request->input('link'),
            'is_free'=>$request->filled('is_free'),
        ]);
        toast('Video Data Updated.......:)','success');


        return redirect()->route('admin.video-index',$video->course_chapter_id);
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return
     */
    public function destroy($id)
    {
        $video =  Video::findOrFail($id);
        $video->delete();
        toast('Video Delete Successfully............','success');
        return redirect()->back();
    }
}
