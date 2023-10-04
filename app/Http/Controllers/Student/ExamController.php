<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ChapterExam;
use App\Models\CourseChapter;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\StudentExam;
use App\Models\StudentExamQuestion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param null $unique_id
     */
    public function index()
    {
        $title = "Exam Of All chapters";
        $chapters = CourseChapter::with(['exams'])->where('course_id',stdCourseId())->get();
        return view('frontend.v2.pages.student.exam.chapter_exam',compact('title','chapters'));
    }

    public function examDetails($id , $unique_id = null)
    {
        $title = "Exam Details";
        $chapterExam = ChapterExam::findOrFail($id);
        $exam = Exam::where('unique_id',$unique_id)->first();


        $studentExams = StudentExam::with(['exam:id,name'])->where('user_id',auth()->id())->where('exam_id',$exam->id)->get();


        //$student = StudentExam::findOrFail($id);

        // Calculate the student's merit position based on marks and exam duration
//        $meritPosition = StudentExam::where('get_mark', '>', $student->get_mark)
//                ->orWhere(function ($query) use ($student) {
//                    $query->where('get_mark', '=', $student->get_mark)
//                        ->whereRaw('exam_end_time - exam_start_time > ?', [$student->exam_end_time - $student->exam_start_time]);
//                })
//                ->count() + 1;

        //return $meritPosition;









        return view('frontend.v2.pages.student.exam.exam_details',compact('title','chapterExam','exam','studentExams'));
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
    public function show(string $id)
    {
        return $id;
    }

    public function showExam($unique_id = null)
    {
        $title = "Questions For The Exam";
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

        session()->put(['examStartTime'=>now()]);

        return view('frontend.v2.pages.student.exam.exam_questions',compact('title','question','exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //return StudentExam::findOrFail($id);



        return $studentResults = StudentExam::select('*',
            \DB::raw('SEC_TO_TIME(TIME_TO_SEC(exam_end_time) - TIME_TO_SEC(exam_start_time)) as diff_time'))
            ->orderBy('get_mark', 'desc')
            ->orderByRaw('exam_end_time - exam_start_time ASC')
            ->findOrFail($id);


        $studentIdToCalculate = 1;

        // Find the student within the collection
        $studentToCalculate = $students->firstWhere('id', $studentIdToCalculate);

        if ($studentToCalculate) {
            // Calculate the student's merit position based on marks and exam duration
            $meritPosition = $students->filter(function ($student) use ($studentToCalculate) {
                    return $student->marks > $studentToCalculate->marks
                        || ($student->marks == $studentToCalculate->marks
                            && strtotime($student->exam_end_time) - strtotime($student->exam_start_time)
                            < strtotime($studentToCalculate->exam_end_time) - strtotime($studentToCalculate->exam_start_time));
                })->count() + 1;

            // Display the student's details and merit position
            echo "Name: " . $studentToCalculate->name . "<br>";
            echo "Marks: " . $studentToCalculate->marks . "<br>";
            echo "Exam Start Time: " . $studentToCalculate->exam_start_time . "<br>";
            echo "Exam End Time: " . $studentToCalculate->exam_end_time . "<br>";
            echo "Time Difference: " . $studentToCalculate->diff_time . "<br>";
            echo "Merit Position: " . $meritPosition . "<br>";
        } else {
            echo "Student not found!";
        }
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
        //
    }

    public function submitQuestions(Request $request)
    {
        //return  "Hours: $hours, Minutes: $minutes, Seconds: $seconds";
        //$doff = Carbon::now()->sub(Carbon::parse(session()->get('examStartTime')));
        //return "hour".Carbon::now()->diffInHours($doff)."       ". "min =".Carbon::now()->diffInMinutes($doff);
        //$examGivenTime = Carbon::parse(now()) - Carbon::parse(session()->get('examStartTime'));
        //return "Start Time : " . session()->get('examStartTime') . "End Time : " . now();

        $title = "Exam Complete";
        $questions =  $request->except(['_token','exam_id']);

        //$diff = $endTime->diff($startTime);

//        $totalSeconds = ($diff->days * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->i * 60) + $diff->s;
//        // Calculate the total minutes
//        $totalMinutes = $totalSeconds / 60;
//        // If you want the remaining seconds after extracting whole minutes
//        $remainingSeconds = $totalSeconds % 60;
//
//        return " Total Seconds : ". $totalSeconds . " Total Minits : ".$totalMinutes . " Remaning Minits : ".$remainingSeconds;

        $endTime = Carbon::now();
        $startTime = Carbon::parse(session()->get('examStartTime'));
        $studentExam = StudentExam::create([
            'user_id'=>auth()->id(),
            'course_id'=>stdCourseId(),
            'exam_id'=>$request->input('exam_id'),
            'exam_start_time'=>$startTime,
            'exam_end_time'=>$endTime,
        ]);

        $exam = Exam::withCount('examQuestions')->findOrFail($request->input('exam_id'));

        $rightAns = 0;
        $wrongAns = 0;

        foreach ($questions as $key => $question){
            $examQuestion = ExamQuestion::findOrFail($key);
            if ($examQuestion->answer == $question['std_given_answer']){
                $rightAns = $rightAns + 1;
            }else{
                $wrongAns = $wrongAns +1;
            }
            StudentExamQuestion::create([
                'student_exam_id'=>$studentExam->id,
                'exam_question_id'=>$key,
                'student_answer'=>$question['std_given_answer'],
                'correct_answer'=>$examQuestion->answer,
            ]);
        }



        $givenAsn = count($questions);




        if ($exam->incorrect_answer == 1){
            $totalMark = $givenAsn - ($wrongAns * 1.25);
        }else{
            $totalMark = $rightAns;
        }



        $passSchore = $exam->exam_questions_count * ($exam->pass_mark /100);



        $eightyPersentMark = $exam->exam_questions_count * (80 /100);;

        $note = "";

        if ($totalMark < $passSchore){
            $note = "Fail";
        }elseif ($totalMark > $passSchore && $totalMark < $eightyPersentMark){
            $note = "Pass";
        }elseif ($totalMark > $eightyPersentMark && $totalMark <= $exam->exam_questions_count){
            $note = "Very Good";
        }

        //return "Total Question : ".$totalExamQuestions .", Total Given Answer : ".$givenAsn." , Wrong Answer : ".$wrongAns.", Right Answer : ".$rightAns;

        $studentExam->update([
            'total_question'=>$exam->exam_questions_count,
            'given_ans'=>$givenAsn,
            'correct_answer'=>$rightAns,
            'wrong_answer' =>$wrongAns,
            'pass_mark'=>$passSchore,
            'get_mark'=>$totalMark,
            'note'=>$note,
        ]);

        //$exam = Exam::findOrFail($request->input('exam_id'));
        return view('frontend.v2.pages.student.exam.complete_exam',compact('title','exam','studentExam'));
    }

    public function completeQuestions($id)
    {
        $student = StudentExam::with(['studentExamQuestions','studentExamQuestions.question'])->findOrFail($id);
          $exam = Exam::findOrFail($student->exam_id);




         //Calculate the student's merit position based on marks and exam duration
//        $meritPosition = StudentExam::where('get_mark', '>', $student->get_mark)
//                ->orWhere(function ($query) use ($student) {
//                    $query->where('get_mark', '=', $student->get_mark)
//                        ->whereRaw('exam_end_time - exam_start_time > ?', [$student->exam_end_time - $student->exam_start_time]);
//                })
//                ->count() + 1;
//
//        return $meritPosition;



//
//       return $meritPosition = StudentExam::where('marks', '>', $student->get_mark)
//                ->orWhere(function ($query) use ($student) {
//                    // Cast exam_start_time and exam_end_time to timestamps
//                    $query->where('get_mark', '=', $student->get_mark)
//                        ->whereRaw('UNIX_TIMESTAMP(exam_end_time) - UNIX_TIMESTAMP(exam_start_time) > ?', [
//                            $student->exam_end_time - $student->exam_start_time
//                        ]);
//                })
//                ->count() + 1;


//        return $this->where('marks', '>', $this->marks)
//                ->orWhere(function ($query) {
//                    $query->where('marks', '=', $this->marks)
//                        ->whereRaw('UNIX_TIMESTAMP(exam_end_time) - UNIX_TIMESTAMP(exam_start_time) > ?', [
//                            $this->exam_end_time->timestamp - $this->exam_start_time->timestamp
//                        ]);
//                })
//                ->count() + 1;

        $meritPosition = StudentExam::where('get_mark', '>', $student->get_mark)
                ->orWhere(function ($query) use ($student) {
                    // Calculate the time difference in seconds
                    $timeDifferenceInSeconds = strtotime($student->exam_end_time) - strtotime($student->exam_start_time);

                    // Use the time difference in the query
                    $query->where('get_mark', '=', $student->get_mark)
                        ->whereRaw('?, ?', [$timeDifferenceInSeconds, $timeDifferenceInSeconds]);
                });

        return $meritPosition;

        return view('frontend.v2.pages.student.exam.show_complete_exam_question',compact('exam','studentExam'));
    }

}
