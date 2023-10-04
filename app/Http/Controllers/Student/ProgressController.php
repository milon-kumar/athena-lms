<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\UserVideo;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function progress()
    {
        $title = "Progress Report";
        $course = Course::with(['chapters','videos'])->findOrFail(stdCourseId());
        $studentVideos = UserVideo::where('user_id',auth()->id())->where('course_id',stdCourseId())->get()->groupBy('video_id');
        $exams = CourseChapter::with(['exams'])->where('course_id',stdCourseId())->get();
        return view('frontend.v2.pages.student.report.progress_report',compact('title','course','studentVideos','exams'));
    }
}
