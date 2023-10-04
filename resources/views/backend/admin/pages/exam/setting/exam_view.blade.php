@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.exam.exam.edit',$exam->id) }}" class="float-end btn btn-success"><i class="mdi mdi-book-edit"></i></a>
        <a href="{{ route('admin.exam.dashboard',$exam->type) }}" class="float-end btn btn-danger">Go Back</a>

        <div class="row">
            <div class="col-8 mx-auto mb-4">
                <div class="text-center">
                    <h3>{{ $exam->name ?? '' }}</h3>
                    <p>{!! $exam->description ?? '' !!}</p>
                    <p class="float-start">Time : {{ $exam->minutes ?? '' }}</p>
                    <p class="float-end">Max Time : {{ $exam->times ?? '' }}</p>
                </div>
            </div>
            @foreach($exam->examQuestions as $question)
                <div class="col-8 mx-auto">
                    <div class="card border shadow">
                        <div class="card-body">
                            <h5>Q{{$loop->iteration}} . {!! $question->question ?? '' !!}</h5>
                            <div style="margin-left: 25px;">
                                @if($question->options)
                                    @foreach(json_decode($question->options ?? []) as $key => $options)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input border border-dark" type="radio" name="answer" id="answer-label-{{$key}}">
                                            <label style="cursor: pointer;" class="form-check-label" for="answer-label-{{$key}}">{{ $options ?? '' }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <a href="" class="float-end btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                            <a href="{{ route('admin.exam.question.edit',$question->id) }}" class="float-end btn btn-success btn-sm"><i class="mdi mdi-book-edit"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
