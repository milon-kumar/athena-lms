<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoComment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Class Video Comments (Student’s Question)";
        $course = Course::findOrFail(courseId(),['id','title']);
        $videos = Video::with(['chapter:id,name','comments'])->get();
        return view('backend.admin.pages.video_comment.index',compact('title','course','videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Store a newly created resource in storage.
     */
    public function videoCommentStoreReplay(Request $request)
    {

//        return $request->all();

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Video By All Chapters";
        $show_video = Video::with(['comments','chapter'])->findOrFail($id);
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapters = CourseChapter::with(['videos:id,course_chapter_id,title,link'])->get(['id','user_id','course_id','name','slug']);
        return view('backend.admin.pages.video_comment.show',compact('title','course','chapters','show_video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
