<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Complain Box";
        //$course = Course::findOrFail(stdCourseId());
        $complains = Complain::where('user_id',auth()->id())->where('course_id',stdCourseId())->latest()->paginate(30);
        //return view('backend.student.pages.complain.index',compact('title','course','complains'));
        return view('frontend.v2.pages.student.complain.index',compact('title','complains'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Complain Box";
        //$course = Course::findOrFail(stdCourseId());
        //return view('backend.student.pages.complain.create',compact('title','course'));
        return view('frontend.v2.pages.student.complain.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'message'=>'max:10000',
        ]);

        Complain::create([
            'user_id'=>auth()->id(),
            'course_id'=>stdCourseId(),
            'type'=>$request->input('type'),
            'slug'=>Str::slug($request->input('type')),
            'message'=>$request->input('message'),
        ]);
        toast('Complain Created Success...:)','success');
        return redirect()->route('student.complain.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Show Complain Details";
        $course = Course::findOrFail(stdCourseId());
        $complain = Complain::findOrFail($id);
        return view('backend.student.pages.complain.show',compact('title','course','complain'));
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
        $complain = Complain::findOrFail($id);
        $complain->delete();
        toast('Complain Deleted Success...:)','success');
        return redirect()->route('student.complain.index');
    }
}
