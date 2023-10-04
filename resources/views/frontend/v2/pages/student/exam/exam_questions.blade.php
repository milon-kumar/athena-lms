@extends('frontend.v2.layout.app')
@section('content')
    <!-- Page header -->
    <section class="py-lg-6 py-4 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white display-4 mb-0">Exam Start Now</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto mb-4">
                    <div class="text-center">
                        <h3>{{ $exam->name ?? '' }}</h3>
                        <p>{!! $exam->description ?? '' !!}</p>
                        <p class="float-start">Time : {{ $exam->minutes ?? '' }}</p>
                        <p class="float-end">Max Time : {{ $exam->times ?? '' }}</p>
                    </div>
                </div>
                <form action="{{ route('student.submit-questions') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8 mx-auto">
                        @foreach($question as $question)
                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
{{--                            <input type="hidden" name="question_id[]" value="{{ $question->id }}">--}}
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h6 class="font-bold fw-bold text-editor-image">Q{{ $loop->iteration }}. {!! $question->question ?? '' !!}</h6>
                                    <div style="margin-left: 25px;">
                                        @if($question->options)
                                            @foreach(json_decode($question->options ?? []) as $key => $options)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input border border-dark"
                                                           type="radio"
                                                           name="{{$question->id}}[std_given_answer]"
                                                           value="{{ $key }}"
                                                           id="answer-label-{{$question->id}}-{{$key}}">
                                                    <label style="cursor: pointer;"
                                                           class="form-check-label"
                                                           for="answer-label-{{$question->id}}-{{$key}}">{{ $options ?? '' }} {{ $loop->iteration }}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="">
                            <button type="submit" class="btn btn-success float-end">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
