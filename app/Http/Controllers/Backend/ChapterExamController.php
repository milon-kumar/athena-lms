<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChapterExam;
use App\Models\Course;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChapterExamController extends Controller
{
    public function chapterExamIndex($id)
    {
        if (invalidPermission('Exam.List')){
            return redirect()->back();
        }

        $title = "All Exam";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($id,['id','name']);
        $exams = ChapterExam::where('course_chapter_id',$chapter->id)->OrderBy('serial','ASC')->get();
        return view('backend.admin.pages.chapter_exam.index',compact('title','course','chapter','exams'));

    }

    public function chapterExamCreate($id)
    {
        if (invalidPermission('Video.Create')){
            return redirect()->back();
        }
        $title = "Create Exam";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($id,['id','name']);
        return view('backend.admin.pages.chapter_exam.create',compact('title','course','chapter'));
    }

    public function chapterExamStore(Request $request)
    {
        if (invalidPermission('Video.Create')){
            return redirect()->back();
        }

        $serials =  $request->input('serials');

        foreach ($serials as $key => $serial) {
            if (!empty($request->input('is_frees')[$key])){
                $is_free = 1;
            }else{
                $is_free = 0;
            }

            ChapterExam::create([
                'user_id'=>Auth::id(),
                'course_id'=>courseId(),
                'course_chapter_id'=>$request->input('chapter_id'),
                'title'=>$request->input('titles')[$key],
                'slug'=>Str::slug($request->input('titles')[$key]),
                'exam_link'=>$request->input('links')[$key],
                'is_free'=>$is_free,
                'serial'=>$request->input('serials')[$key],
            ]);
        }

        toast('Exam Create Successfully...','success');
        return redirect()->route('admin.chapter-exam-index',$request->input('chapter_id'));
    }

    public function chapterExamEdit($id,$chapter_id = null)
    {
        if (invalidPermission('Exam.Edit')){
            return redirect()->back();
        }
        $title = "Edit Chapter Exam";
        $course = Course::findOrFail(courseId(),['id','title']);
        $chapter = CourseChapter::findOrFail($chapter_id,['id','name']);
        $exam = ChapterExam::findOrFail($id);
        return view('backend.admin.pages.chapter_exam.edit',compact('title','course','chapter','exam'));
    }

    public function chapterExamUpdate($id ,Request $request)
    {
        $exam = ChapterExam::findOrFail($id);

        if (!empty($request->input('is_free'))){
            $is_free = 1;
        }else{
            $is_free = 0;
        }

        $exam->update([
            'user_id'=>Auth::id(),
            'course_id'=>courseId(),
            'course_chapter_id'=>$exam->course_chapter_id,
            'title'=>$request->input('title'),
            'slug'=>Str::slug($request->input('title')),
            'exam_link'=>$request->input('link'),
            'is_free'=>$is_free,
            'serial'=>$request->input('serial'),
            'time'=>$request->input('time'),
        ]);

        toast("Chapter Exam Update Successfully",'success');
        return redirect()->route('admin.chapter-exam-index',$exam->course_chapter_id);
    }

    public function chapterExamDelete($id)
    {
        $exam = ChapterExam::findOrFail($id);
        $exam->delete();

        toast('Chapter Exam Delete Successfully','success');
        return back();
    }
}
