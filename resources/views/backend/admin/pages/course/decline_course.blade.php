@extends('backend.admin.layouts.app')
@section('title','All Students')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        @include('backend.admin.components.course_table_header')
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Course Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $course)
                                        <tr>
                                            <td>#{{ $loop->iteration }}</td>
                                            <td>{{ Str::limit(optional($course->category)->name,20) }}</td>

                                            <td class="table-user">
                                                <img src="{{asset($course->image)}}" alt="table-user" class="me-2 rounded-circle">
                                                <a href="javascript:void(0);" class="text-body fw-semibold">{{ optional($course)->title }}</a>
                                            </td>
                                            <td>
                                                @include('backend.admin.components.all_status')
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.change-status',$course->id ?? '') }}" class="btn btn-warning btn-sm"><i class="dripicons-checkmark"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
