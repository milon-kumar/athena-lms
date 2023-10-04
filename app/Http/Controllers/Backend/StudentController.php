<?php

namespace App\Http\Controllers\Backend;

use App\Exports\StudentDatabaseExport;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrole;
use App\Models\FBGroupAccessCode;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Student.List')){
            return  redirect()->back();
        }

        $title ="Student Database";
        $course =  Course::with('users')->findOrFail(courseId());
        return view('backend.admin.pages.student.index',compact('course','title'));
    }

    public function databaseDownload()
    {
        $course = Course::with('users')->findOrFail(courseId());
        $title ="Download Student Database";
        return view('backend.admin.pages.student.download',compact('title','course'));
    }

    public function studentOpinion()
    {
        return view('backend.admin.pages.student.student_opinion');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function fbGroupAccessCode()
    {
        $title = "Facebook Group Access Code";
        $codes = FBGroupAccessCode::with(['user'])->where('course_id',courseId())->where('status','published')->get();
        $course = Course::findOrFail(courseId());
        return view('backend.admin.pages.fb_group_access_code.fb_group_access_code',compact('title','codes','course'));
    }

    public function fbGroupAccessCodeDelete($id)
    {
        FBGroupAccessCode::findOrFail($id)->delete();

        toast('Code Delete Successfully','success');
        return back();
    }

    public function classAttendance()
    {
        $title = "Attendance";
        $course = Course::with(['users','userVideos','chapters','exams'])->findOrFail(courseId());

        return view('backend.admin.pages.attendance.index',compact('title','course'));
    }
}
