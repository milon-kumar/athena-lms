@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <section class="">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Total Question</h6>
                            <h4>{{ $studentExam->total_question ?? '' }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Given Answer</h6>
                            <h4>{{ $studentExam->given_ans ?? '' }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Pass Mark</h6>
                            <h4>{{ $studentExam->pass_mark ?? '' }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Marks Obtained</h6>
                            <h4>{{ $studentExam->get_mark ?? ''}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Notes</h6>
                            <h4>{{ $studentExam->note ?? ''}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    @foreach($studentExam->studentExamQuestions as $question)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="font-bold fw-bold text-editor-image">Q{{ $loop->iteration }}. {!!$question->question->question ?? '' !!}</h6>
                                <div style="margin-left: 25px;">
                                    @if($question->question->options)
                                        @foreach(json_decode($question->question->options ?? []) as $key => $options)
                                            <div class="form-check mb-2">
                                                {{-- 1. Check First Currect Answer --}}
                                                <input class="form-check-input border border-dark"
                                                       type="radio"
                                                       value=""
                                                       disabled
                                                       {{ $key == $question->student_answer ? 'checked' : '' }}
                                                       id="answer-label-{{$question->id}}-{{$key}}">
                                                <label style="cursor: pointer;"
                                                       class="form-check-label text-primary fw-bolder"
                                                       for="answer-label-{{$question->id}}-{{$key}}">
                                                    <span class="{{ $key == $question->correct_answer ? 'text-success' : '' }}">
                                                    {{ $options ?? '' }} <i class=""></i>
                                                    </span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @if($exam->display_explanation)
                                    <div class="mt-3 text-white">
                                        @if($question->question->explanation)
                                            <h6>{!! $question->question->explanation !!}</h6>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection
