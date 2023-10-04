@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course Name : {{ $course->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }} ( Send Notification {{ $users->count() ?? ''}} Students )</h3>
                        <a href="{{ route('admin.transfer.student') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.course-notification') }}" method="post" class="card border">
                                    @csrf
                                    <div class="card-header bg-dark text-white ">
                                        Notification Message
                                    </div>
                                    <div class="card-body">
                                        <textarea name="message" id="" class="form-control" rows="10"></textarea>
                                        @error('message')
                                        <small class="fw-bold text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark btn-sm">Send Notification</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
