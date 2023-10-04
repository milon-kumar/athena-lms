<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function details($slug)
    {
        $course = Course::with(['courseDetails', 'category', 'courseDetails.teacher', 'chapters' => function ($query) {
            return $query->orderBy('serial', 'DESC');
        }, 'chapters.videos', 'videos'])->where('slug', $slug)->first();

        return view('frontend.pages.course.details', [
            'course' => $course,
        ]);
    }
}
