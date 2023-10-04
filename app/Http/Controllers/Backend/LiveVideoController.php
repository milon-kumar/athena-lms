<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LiveVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LiveVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Live Videos List";
        $course = Course::findOrFail(courseId());
        $videos = LiveVideo::where('course_id',$course->id)->orderBy('serial','ASC')->get();
        return view('backend.admin.pages.live_video.index',compact('title','course','videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Live Video Create";
        $course = Course::findOrFail(courseId());
        return view('backend.admin.pages.live_video.create',compact('title','course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('LiveVideo.Create')){
            return redirect()->back();
        }


        $serials =  $request->input('serials');

        foreach ($serials as $key => $serial) {
            LiveVideo::create([
                'user_id'=>Auth::id(),
                'course_id'=>courseId(),
                'title'=>$request->input('titles')[$key],
                'slug'=>Str::slug($request->input('titles')[$key]),
                'link'=>$request->input('links')[$key],
                'serial'=>$request->input('serials')[$key],
            ]);
        }

        toast('Live Videos Created Successfully...','success');
        return  redirect()->route('admin.live-video.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Live Video";
        $course = Course::findOrFail(courseId(),['id','title']);
        $video = LiveVideo::findOrFail($id);
        return view('backend.admin.pages.live_video.edit',compact('title','video','video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (invalidPermission('LiveVideo.Edit')){
            return redirect()->back();
        }

        $video = LiveVideo::findOrFail($id);

        $video->update([
            'user_id'=>auth()->id(),
            'course_id'=>courseId(),
            'serial'=>$request->input('serial'),
            'title'=>$request->input('title'),
            'slug'=>Str::slug($request->input('video_title')),
            'link'=>$request->input('link'),
        ]);
        toast('Live Video Data Updated.......:)','success');
        return redirect()->route('admin.live-video.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = LiveVideo::findOrFail($id);
        $video->delete();
        toast('Live Video Delete successfully.......:)','success');
        return redirect()->route('admin.live-video.index');
    }
}
