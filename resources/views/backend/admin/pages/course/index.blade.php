@extends('backend.admin.layouts.app')
@section('title','All Students')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title d-inline">All Course <span class="badge badge-success-lighten">{{$courses->count()}}</span></h4>
                        <a href= "{{route('admin.course.create')}}" class="btn btn-success float-end">Add New Course</a>
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
                                        <th>Regular Course Fee</th>
                                        <th>Discount</th>
                                        <th>Full Course Fee</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                <td>{{ optional($course)->regular_course_fee }}</td>
                                                <td>{{ optional($course)->discount_fee }}</td>
                                                <td>{{ optional($course)->full_course_fee }}</td>
                                                <td>
                                                    @if(optional($course)->status == 1)
                                                        <a href="">
                                                            <span class="badge badge-success-lighten">Published</span>
                                                        </a>
                                                    @else
                                                        <a href="">
                                                            <span class="badge badge-danger-lighten">Unpublished</span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.course.edit',$course->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('deleteForm{{ $course->id }}').submit()" class="btn btn-danger btn-sm">Delete</a>
                                                    <form action="{{ route('admin.course.destroy',$course->id) }}" id="deleteForm{{ $course->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
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
