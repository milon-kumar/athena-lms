@extends('backend.admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h4>Course : {{ $course->title ?? '' }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @foreach($videos as $video)
            <a href="{{ route('admin.video-comment.show',$video->id) }}" class="row mb-1">
                <span class="col-12 card shadow border">
                    <span class="card-body">
                        <span class="row">
                            <div class="col-md-4">
                                <div class="" style="width: 120px;height: 90px;overflow: hidden;">
{{--                                    <img style="width: 100%;height: 100%;object-fit: contain;" src="https://img.youtube.com/vi/{{ $video->link ?? '' }}/0.jpg" alt="">--}}
                                    {!! $video->link !!}
                                </div>
                            </div>
                            <span class="col-md-4">
                                <h4 class="text-dark fw-bold">{{ $video->title ?? '' }}</h4>
                                <p class="text-muted">{{ $video->chapter->name ?? '' }}</p>
                            </span>
                            <span class="col-md-4">
{{--                                <h4> <i class="mdi mdi-eye mdi-24px"></i> Total View : {{ $video->view_count ?? '' }}</h4>--}}
                                <h4> <i class="mdi mdi-comment mdi-24px"></i> Total Comment : {{ $video->comments->count() ?? '' }}</h4>
                                <small class="fw-bold">Created At : {{ $video->created_at->diffForHumans() }}</small>
                            </span>
                        </span>
                    </span>
                </span>
            </a>
        @endforeach
    </div>
@endsection
