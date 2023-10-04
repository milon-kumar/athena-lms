@extends('backend.admin.layouts.app')
@section('title',$title)
@section('style')
    <style>
        .videoPlayer{
            width: 100%;
            height: 120px;
            overflow: hidden;
        }
        .videoPlayer iframe{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection
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
                        <h3 class="header-title d-inline">{{ $title }}<span class="badge badge-success-lighten">{{$videos->count()}}</span></h3>
                        <a href="{{ route('admin.chapters.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Video.Create')
                            <a href="{{ route('admin.video-create',$chapter->id) }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Video</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Video</th>
                                <th>Video Title</th>
                                <th>Video Duration</th>
                                <th>Free Status</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $key => $video)
                                <tr>
                                    <td>{{ $video->serial ?? ''}}</td>
                                    <td>
                                        <div class="">
                                            {!! $video->link !!}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="fw-bolder text-dark">
                                            {{ $video->title ?? ''}}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $video->duration ?? '00-00-00' }}
                                    </td>
                                    <td>
                                        @if($video->is_free == 1)
                                            <span class="badge badge-danger-lighten">Free Video</span>
                                        @else
                                            <span class="badge badge-info-lighten">Paid Video</span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('Video.Show')
                                            <a href="{{ route('admin.video-show',[$video->id , $chapter->id]) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-eye"></i> View</a>
                                        @endcan
                                        @can('Video.Edit')
                                            <a href="{{ route('admin.video-edit',[$video->id , $chapter->id]) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i> Edit </a>
                                        @endcan
                                        @can('Video.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $video->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete </a>
                                                <form action="{{ route('admin.video.destroy',$video->id) }}" method="post" id="delete-form-{{$video->id}}">@csrf @method('DELETE')</form>
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
