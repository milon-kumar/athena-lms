<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Teacher.List')){
            return redirect()->back();
        }
        $title = "Teachers List";
        $teachers = Teacher::latest()->get();
        return view('backend.admin.pages.teacher.index',compact('title','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Teacher.Create')){
            return redirect()->back();
        }
        $title = "Create A New Teacher";
        return view('backend.admin.pages.teacher.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('Teacher.Create')){
            return redirect()->back();
        }
        $names =  $request->input('names');
        foreach ($names as $key => $name) {
           Teacher::create([
               'name'=> $request->input('names')[$key],
               'email'=> $request->input('emails')[$key],
               'phone'=>$request->input('phones')[$key],
               'image'=> $request->file('images')[$key]->store('/images', ['disk' =>'my_files'] ?? config('filesystems.noimage')),
               'description'=>$request->input('descriptions')[$key],
           ]);
        }
        toast('Teacher Created Successfully....','success');
        return redirect()->route('admin.teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        if (invalidPermission('Teacher.Edit')){
            return redirect()->back();
        }

        $title = "Edit Teacher";
        return view('backend.admin.pages.teacher.edit',compact('title','teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        if (invalidPermission('Teacher.Edit')){
            return redirect()->back();
        }
        $teacher->update([
            'name'=> $request->input('names'),
            'email'=> $request->input('emails'),
            'phone'=>$request->input('phones'),
            'image'=> uploadImage($request),
            'description'=>$request->input('descriptions'),
        ]);
        toast('Teacher Update Successfully.....','success');
        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if (invalidPermission('Teacher.Delete')){
            return redirect()->back();
        }

        if ($teacher->image){
            @unlink($teacher->image);
        }
        $teacher->delete();
        toast('Teacher Deleted Successfully done...', 'success');
        return back();
    }
}
