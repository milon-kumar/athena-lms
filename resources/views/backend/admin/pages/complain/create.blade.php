@extends('backend.admin.layouts.app')
@section('title',$title)
@section('style')
    <style>
        .label-hand{
            cursor: pointer;
        }
    </style>
@endsection
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
                    <h5 class="d-inline-block">Create Complain</h5>
                    @can('Complain.List')
                        <a href="{{ route('admin.complain.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    @endcan
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.complain.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <div class="form-check form-radio-info mb-2">
                                <input type="radio" id="type-1" name="type" value="Lecture Video / Exam Solve Video" class="form-check-input border border-secondary" checked>
                                <label class="form-check-label label-hand" for="type-1">Lecture Video / Exam Solve Video</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-radio-info mb-2">
                                <input type="radio" id="type-2" name="type" value="Exam Link" class="form-check-input border border-secondary" >
                                <label class="form-check-label label-hand" for="type-2">Exam Link</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-radio-info mb-2">
                                <input type="radio" id="type-3" name="type" value="Publications (Lecture Sheet / Books)" class="form-check-input border border-secondary" >
                                <label class="form-check-label label-hand" for="type-3">Publications (Lecture Sheet / Books)</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-radio-info mb-2">
                                <input type="radio" id="type-4" name="type" value="Technical / Payment Issue" class="form-check-input border border-secondary" >
                                <label class="form-check-label label-hand" for="type-4">Technical / Payment Issue</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-radio-info mb-2">
                                <input type="radio" id="type-5" name="type" value="Others" class="form-check-input border border-secondary" >
                                <label class="form-check-label label-hand" for="type-5">Others</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Complain Details</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="message" id="" rows="3">{!! old('description') !!}</textarea>
                            @error('message')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
