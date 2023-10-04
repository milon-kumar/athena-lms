<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use App\Models\Exam;
use App\Models\StudentExam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Course Exam Result";
        $chapters = CourseChapter::with(['exams'])->where('course_id',courseId())->get();
        $studentExam = StudentExam::where('course_id',courseId())->get()->groupBy('user_id');
        return  view('backend.admin.pages.exam_result.index',compact('title','chapters','studentExam'));
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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Exam Result Details";
//        $students = StudentExam::orderBy('get_mark', 'desc')
//            ->orderByRaw('exam_end_time - exam_start_time ASC')
//            ->get();

        $studentResults = StudentExam::select('*',
            \DB::raw('SEC_TO_TIME(TIME_TO_SEC(exam_end_time) - TIME_TO_SEC(exam_start_time)) as diff_time'))
            ->orderBy('get_mark', 'desc')
            ->orderByRaw('exam_end_time - exam_start_time ASC')
            ->get();

        //return $studentResults;



        //return $studentResults = StudentExam::with('student')->where('exam_id', $id)->get();
        return view('backend.admin.pages.exam_result.show',compact('title','studentResults'));
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

    }
}
