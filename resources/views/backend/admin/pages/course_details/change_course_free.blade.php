@extends('backend.admin.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course : {{ $course->title ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.update-course-free') }}" method="post" class="card border shadow">
                    @csrf
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 position-relative">
                            <label class="form-label">Regular Course Fee</label>
                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'regular_course_fee','value'=>$course->regular_course_fee,])
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label">Discount</label>
                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_fee','value'=>$course->discount_fee,])
                        </div>
                        <div class="mb-3 position-relative">
                            <label class="form-label">Full Course Fee (after Discount)</label>
                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'full_course_fee','readonly'=>'readonly','value'=>$course->full_course_fee,])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark float-end btn-lg">Update Course Free</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
