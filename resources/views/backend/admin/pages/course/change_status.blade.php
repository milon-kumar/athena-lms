@extends('backend.admin.layouts.app')
@section('title','Change Course Status')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mx-auto mt-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1>Athena Science Academy</h1>
                        <h4 class="header-title">Change Course Status</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.make-published') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Course</label>
                                <input type="text" class="form-control" value="{{ $course->title ?? '' }}" readonly name="title" placeholder="Course Title">
                                <input type="hidden" class="form-control" value="{{ $course->id ?? '' }}" readonly name="course_id" placeholder="Course Title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Select Course Category</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select name="status" class="form-control fw-bold text-uppercase">
                                                <option value="pending" {{$course->status == 'pending' ? 'selected' : ''}} class="text-uppercase text-warning fw-bolder">pending</option>
                                                <option value="published" {{$course->status == 'published' ? 'selected' : ''}} class="text-uppercase text-success fw-bolder">published</option>
                                                <option value="unpublished" {{$course->status == 'unpublished' ? 'selected' : ''}} class="text-uppercase text-warning fw-bolder">unpublished</option>
                                                <option value="pending" {{$course->status == 'pending' ? 'selected' : ''}} class="text-uppercase text-dark fw-bolder">pending</option>
                                                <option value="decline" {{$course->status == 'decline' ? 'selected' : ''}} class="text-uppercase text-danger fw-bolder">decline</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">Go Back</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
