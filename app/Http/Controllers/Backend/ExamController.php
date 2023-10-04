<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function createExam()
    {
        $title = "Create Exam";
        return view('backend.admin.pages.exam.exam.create',compact('title'));
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $exam = Exam::create([
                'user_id'=>Auth::id(),
                'unique_id'=>Str::random(10),
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'conclusion_text'=>$request->input('conclusion_text'),
                'pass_message'=>$request->input('pass_message'),
                'fail_message'=>$request->input('fail_message'),
                'is_random'=>$request->filled('is_random'),
                'blank_answer'=>$request->filled('blank_answer'),
                'incorrect_answer'=>$request->filled('incorrect_answer'),
                'correct_incorrect'=>$request->filled('correct_incorrect'),
                'display_correct_answer'=>$request->filled('display_correct_answer'),
                'display_explanation'=>$request->filled('display_explanation'),
                'password'=>Hash::make($request->input('password')),
                'times'=>$request->input('times'),
                'minutes'=>$request->input('minutes'),
                'pass_mark'=>$request->input('pass_mark'),
            ]);
            $questions = $request->input('questions');
            foreach ($questions as $question){
                ExamQuestion::create([
                    'user_id'=>Auth::id(),
                    'exam_id'=>$exam->id,
                    'question'=>$question['q'],
                    'answer'=>$question['answer'],
                    'options'=>json_encode($question['option']),
                    'explanation'=>$question['explanation'],
                ]);
            }
            DB::commit();

            toast('Exam Created Successfully','success');
            return redirect()->route('admin.exam.dashboard',$request->input('type'));

        }catch (\Exception $exception){
            DB::rollBack();
            toast('Something Went Wrong','error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "View Exam";
         $exam =  Exam::with('examQuestions')->findOrFail($id);
        return view('backend.admin.pages.exam.setting.exam_view',compact('title','exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Exam Edit";
        $exam = Exam::findOrFail($id);
        return view('backend.admin.pages.exam.setting.edit_setting',compact('title','exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update([
            'user_id'=>Auth::id(),
            'unique_id'=>$exam->unique_id,
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'conclusion_text'=>$request->input('conclusion_text'),
            'pass_message'=>$request->input('pass_message'),
            'fail_message'=>$request->input('fail_message'),
            'is_random'=>$request->filled('is_random'),
            'blank_answer'=>$request->filled('blank_answer'),
            'incorrect_answer'=>$request->filled('incorrect_answer'),
            'correct_incorrect'=>$request->filled('correct_incorrect'),
            'display_correct_answer'=>$request->filled('display_correct_answer'),
            'display_explanation'=>$request->filled('display_explanation'),
            'password'=>Hash::make($request->input('password')),
            'times'=>$request->input('times'),
            'minutes'=>$request->input('minutes'),
            'pass_mark'=>$request->input('pass_mark'),
        ]);

        toast('Exam Setting Update','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::findOrFail($id);
        $examQuestion = ExamQuestion::where('exam_id',$exam->id)->get();
        foreach ($examQuestion as $question){
            $question->delete();
        }
        $exam->delete();

        toast("Exam Delete Success",'success');
        return redirect()->back();
    }

    public function publishLink($unique_id)
    {
        $exam = Exam::where('unique_id',$unique_id)->first();
        $query = ExamQuestion::query();

        if (!empty($exam->is_pagination)){
            $question = $query->where('exam_id',$exam->id)->simplePaginate();
        }else{
            $question = $query->where('exam_id',$exam->id)->get();
        }
        if (!empty($exam->is_random)){
            $question = $query->inRandomOrder()->get();
        }

        return view('question',compact('exam','question'));
    }

    public function questionEdit($id)
    {
        $title = "Question Edit";
        $question =  ExamQuestion::findOrFail($id);

        $options =  json_decode($question->options);
        $optionItem = [];
        foreach ($options as $option){
            $optionItem[] = $option;
        }

        return view('backend.admin.pages.exam.setting.edit_question',compact('title','question','optionItem'));
    }

    public function questionUpdate(Request $request,$id)
    {



        //return $request;
        $question =  ExamQuestion::with(['exam:id,type'])->findOrFail($id);

        $question->update([
            'user_id'=>Auth::id(),
            'exam_id'=>$question->exam->id,
            'question'=>$request->input('q'),
            'answer'=>$request->input('answer'),
            'options'=>json_encode($request->input('option')),
            'explanation'=>$request->input('explanation'),
        ]);

        return redirect()->route('admin.exam.exam.show',$question->exam->id);
    }
}
