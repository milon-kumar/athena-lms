@extends('backend.admin.layouts.app')
@section('title',$title)
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
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}<span class="badge badge-success-lighten">{{$chapters->count()}}</span></h3>
                        <a href="{{ route('admin.course-details.create') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Class.Create')
                            <a href="{{ route('admin.chapters.create') }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Chapter</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>Chapter Name</th>
                                <th>Serial Number</th>
                                <th>Videos</th>
                                <th>Exams</th>
{{--                                <th>Free Status</th>--}}
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($chapters as $key => $chapter)
                                    <tr>
                                        <td>
                                            <div class="form-check mb-2">
                                                {{--<input type="radio" name="chapter_id" id="chapter-{{optional($chapter)->id}}" onclick="setId({{ optional($chapter)->id }})">--}}
                                                <label class="form-check-label" style="cursor: pointer;" for="chapter-{{$chapter->id}}">{{ optional($chapter)->name }}</label>
                                            </div>
                                        </td>
                                        <td>{{ optional($chapter)->serial }}</td>
                                        <td>{{ $chapter->videos->count() }}</td>
                                        <td>{{ $chapter->exams->count() }}</td>
{{--                                        <td>--}}
{{--                                            @if($chapter->is_free == 1)--}}
{{--                                                <span class="badge badge-danger-lighten">Free Class</span>--}}
{{--                                            @else--}}
{{--                                                <span class="badge badge-info-lighten">Paid Class</span>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td class="text-left">
                                            @can('Video.List')
                                                <a href="{{ route('admin.video-index',$chapter->id) }}"class="btn btn-dark btn-sm"><i class="mdi mdi-video"></i> Video</a>
                                            @endcan
                                            @can('Exam.List')
                                                <a href="{{ route('admin.chapter-exam-index',$chapter->id) }}"class="btn btn-dark btn-sm"><i class="mdi mdi-book-alphabet"></i> Exam</a>
                                            @endcan
                                            @can('Class.Edit')
                                                <a href="{{ route('admin.chapters.edit',$chapter->id ?? '') }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i> Edit</a>
                                            @endcan
                                            @can('Class.Delete')
                                                <a href="Javascript:void(0);" onclick="deleteData({{ $chapter->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete</a>
                                                <form action="{{ route('admin.chapters.destroy',$chapter->id) }}" id="delete-form-{{$chapter->id}}" class="d-none" method="post">@csrf @method('DELETE')</form>
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
