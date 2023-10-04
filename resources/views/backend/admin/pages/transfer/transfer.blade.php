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
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Student Information</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Course Information</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.transfer.transfer-store') }}" method="post" class="card border">
                                    @csrf
                                    <div class="card-header bg-dark text-white ">
                                        Select Change Course
                                    </div>
                                    <div class="card-body">
                                        <label for="">Select Course</label>
                                        <select name="course_id" class="form-control select2" data-toggle="select2">
                                            <option selected class="d-none">~~~Select~~~</option>
                                            @foreach(\App\Models\Course::where('status','published')->get() as $course)
                                                <option value="{{ $course->id }}">{{ $course->title ?? '' }}</option>
                                            @endforeach
                                        </select>

                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="perv_course_id" value="{{ $course->id }}">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark btn-sm">Submit</button>
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
