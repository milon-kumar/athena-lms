<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamDashboardController extends Controller
{
    public function dashboard()
    {
        $title = "Exam Dashboard";
        $exams = Exam::with(['examQuestions'])->latest()->get();
        return view('backend.admin.pages.exam.dashboard.dashboard',compact('title','exams'));
    }
}
