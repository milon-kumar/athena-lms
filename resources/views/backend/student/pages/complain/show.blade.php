@extends('backend.student.layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <h2>{{ $title ?? '' }}</h2>
                    <h5>Course : {{ $course->title ?? '' }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="d-inline-block">{{ $complain->type ?? '' }}</h5>
                    <a href="{{ route('student.complain.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                </div>
                <div class="card-body">
                    <small class="d-block mb-2">Create Time : {{ $complain->created_at->diffForHumans() }}</small>
                    <hr/>
                    <p class="fw-bold">{{ \Illuminate\Support\Str::limit($complain->message,100) ?? '' }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
