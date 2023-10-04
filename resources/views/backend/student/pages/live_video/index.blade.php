@extends('backend.student.layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white border shadow text-center">
                <div class="card-body">
                    <h1>{{ $title }}</h1>
                    <h5>Course : {{ $course->title }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($videos as $video)
            <div class="col-md-4">
                <a href="{{ route('student.single-live-video',$video->id) }}" class="card shadow border">
                    <img class="img-fluid" style="width: 100%;height: 100%;object-fit: contain;" src="https://img.youtube.com/vi/{{ $video->link ?? '' }}/0.jpg" alt="">
                    <div class="card-body">
                        <h5>{{ $video->title ?? '' }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
