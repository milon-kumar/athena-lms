@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">All Teachers <span class="badge badge-success-lighten">{{$teachers->count()}}</span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Opinion.Create')
                            <a href="{{ route('admin.teacher.create') }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Teacher</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($teachers as $teacher)
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="card-header p-4">
                                            <img src="{{asset($teacher->image) ?? defaultImage()}}" class="card-img-top rounded" alt="{{ $teacher->name ?? '' }}">
                                        </div>
                                        <div class="card-body">
                                            <span class="h4 font-weight-normal text-gray">{{ $teacher->name ?? "Teacher Name" }}</span>
                                            <br/>
                                            <span class="h5 font-weight-normal text-gray">{{ $teacher->line2 ?? "Line 2" }}</span>
                                            <div class="mt-2">
                                                <div class="">{{ $teacher->line3 }}</div>
                                                <div class="">{{ $teacher->line4 }}</div>
                                                <div class="">{{ $teacher->line5 }}</div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <a href="{{ $teacher->fb_page }}"><i class="mdi mdi-facebook" style="font-size: 30px;color: #0866FF;"></i></a>
                                                    <a href="{{ $teacher->youtube_chanel }}"><i class="mdi mdi-youtube" style="font-size: 34px;color: #ff0600;"></i></a>
                                                </div>
                                                <div class="">
                                                    <a href="" class="btn btn-sm btn-success"><i class="mdi mdi-all-inclusive"></i></a>
                                                    <a href="{{ route('admin.teacher.edit',$teacher->id) }}" class="btn btn-sm btn-success"><i class="mdi mdi-account-edit"></i></a>
                                                    <a href="" class="btn btn-sm btn-danger"><i class="mdi mdi-trash-can"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
