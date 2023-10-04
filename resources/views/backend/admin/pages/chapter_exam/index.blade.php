@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h4>Course : {{ $course->title ?? '' }}</h4>
                        <h5>Chapter : {{ $chapter->name ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}<span class="badge badge-success-lighten">0</span></h3>
                        <a href="{{ route('admin.chapters.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Video.Create')
                            <a href="{{ route('admin.chapter-exam-create',$chapter->id) }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Exam</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Title</th>
                                <th>Preview Exam</th>
{{--                                <th>Time</th>--}}
                                <th>Free Status</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $exam->serial }}</td>
                                    <td>{{ $exam->title }}</td>
                                    <td>
                                        <a href="{{ route('exam-publishlink',$exam->exam_link) }}" target="_blank"><span class="badge bg-success badge-success">Preview Exam</span></a>
                                    </td>
{{--                                    <td>{{ $exam->time }}</td>--}}
                                    <td>
                                        @if($exam->is_free == 1)
                                            <span class="badge badge-danger-lighten">Free Exam</span>
                                        @else
                                            <span class="badge badge-info-lighten">Paid Exam</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('Exam.Edit')
                                            <a href="{{ route('admin.chapter-exam-edit',[$exam->id , $chapter->id]) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i> Edit </a>
                                        @endcan
                                        @can('Exam.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $exam->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete </a>
                                            <form action="{{ route('admin.chapter-exam-delete',$exam->id) }}" method="post" id="delete-form-{{$exam->id}}">@csrf @method('DELETE')</form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
