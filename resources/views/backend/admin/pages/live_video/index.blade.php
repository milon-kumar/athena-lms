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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}<span class="badge badge-success-lighten">{{$videos->count()}}</span></h3>
                        <a href="{{ route('admin.course-details.create') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('LiveVideo.Create')
                            <a href="{{ route('admin.live-video.create') }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Video</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Video</th>
                                <th>Video Title</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $key => $video)
                                <tr>
                                    <td>{{ $video->serial ?? ''}}</td>
                                    <td style="width: 20%;!important;">
                                        {!! $video->link !!}
                                    </td>
                                    <td>
                                        <a href="" class="fw-bolder text-dark">
                                            {{ $video->title ?? ''}}
                                        </a>
                                    </td>
                                    <td>
                                        @can('LiveVideo.Edit')
                                            <a href="{{ route('admin.live-video.edit',$video->id) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i> Edit </a>
                                        @endcan
                                        @can('LiveVideo.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $video->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete </a>
                                            <form action="{{ route('admin.live-video.destroy',$video->id) }}" method="post" id="delete-form-{{$video->id}}">@csrf @method('DELETE')</form>
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
