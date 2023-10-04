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
    <div class="col-10 mx-auto">
        <div class="card border shadow">
            <div class="card-header bg-dark text-white">
                <h4 class="d-inline-block">{{ $video->title ?? '' }}</h4>
                <a href="{{ route('student.live-video') }}" class="btn btn-danger btn-sm float-end">Go Back</a>
            </div>
            <div class="card-body">
                <iframe id="myIframe" style="width: 100%;height: 450px;" src="https://www.youtube.com/embed/{{optional($video)->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
@endsection
