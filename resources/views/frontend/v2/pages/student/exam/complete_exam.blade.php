@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="mb-4">Your Exam complete </h1>
            <p class="mb-3">{!! $exam->conclusion_text ?? 'Conclusion Text' !!}</p>
            @if($studentExam->note == "Fail")
                <p>{!! $exam->fail_message !!}</p>
            @else
                <p>{!! $exam->pass_message !!}</p>
            @endif
        </div>
    </div>
@endsection
