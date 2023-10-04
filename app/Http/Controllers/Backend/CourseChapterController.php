<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Class.List')){
            return redirect()->back();
        }
        $title = "All Chapter";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapters =  CourseChapter::with(['course:id,title','videos','exams'])->where('course_id',courseId())->orderBy('serial','ASC')->get();
        return view('backend.admin.pages.chapter.index',compact('chapters','title','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Class.Create')){
            return redirect()->back();
        }
        $title = "Add Chapter";
        $course = Course::findOrFail(courseId(),['id','title']);
        return view('backend.admin.pages.chapter.create',compact('title','course'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('Class.Create')){
            return redirect()->back();
        }

        $names =  $request->input('names');
        foreach ($names as $key => $name) {

        if (!empty($request->input('is_frees')[$key])){
            $is_free = 1;
        }else{
            $is_free = 0;
        }

            CourseChapter::create([
               'user_id'=>auth()->id(),
               'course_id'=>courseId(),
               'name'=>$request->input('names')[$key],
               'slug'=>Str::slug($request->input('names')[$key]),
               'serial'=>$request->input('serials')[$key],
               'is_free'=>$is_free,
           ]);
        }

        toast('Chapter Created','success');
        return redirect()->route('admin.chapters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseChapter $courseChapter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseChapter $courseChapter,$id)
    {
        if (invalidPermission('Class.Edit')){
            return redirect()->back();
        }
        $title = "Edit Chapter";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($id);
        return view('backend.admin.pages.chapter.edit',compact('title','course','chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseChapter $courseChapter,$id)
    {
        $chapter = CourseChapter::findOrFail($id);
        $chapter->update([
            'user_id'=>auth()->id(),
            'course_id'=>courseId(),
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name')),
            'serial'=>$request->input('serial'),
            'is_free'=>filled($request->is_free ?? null)
        ]);
        toast('Chapter Data Updated....... :)','success');
        return redirect()->route('admin.chapters.index');
    }

    /**
     * Remove the specified resource from storage.
     **/

    public function destroy(CourseChapter $courseChapter,$id)
    {
        CourseChapter::findOrFail($id)->delete();
        toast('Chapter Deleted Successfully........','success');
        return redirect()->route('admin.chapters.index');
    }
}
