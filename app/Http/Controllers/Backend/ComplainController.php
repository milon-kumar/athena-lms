<?php

namespace App\Http\Controllers\Backend;

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
        $course = Course::findOrFail(courseId());
        $complains = Complain::with(['user'])->where('course_id',courseId())->latest()->paginate(30);
        return view('backend.admin.pages.complain.index',compact('title','course','complains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create A New Complain";
        $course = Course::findOrFail(courseId());
        return view('backend.admin.pages.complain.create',compact('title','course'));
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
            'course_id'=>courseId(),
            'type'=>$request->input('type'),
            'slug'=>Str::slug($request->input('type')),
            'message'=>$request->input('message'),
        ]);

        toast('Complain Created Success...:)','success');
        return redirect()->route('admin.complain.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Complain Details";
        $course = Course::findOrFail(courseId());
        $complain = Complain::findOrFail($id);
        return view('backend.admin.pages.complain.show',compact('title','course','complain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Complain";
        $course = Course::findOrFail(courseId());
        $complain = Complain::findOrFail($id);
        return view('backend.admin.pages.complain.edit',compact('title','course','complain'));
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

        toast('Complain Delete Successfully','success');
        return back();
    }
}
