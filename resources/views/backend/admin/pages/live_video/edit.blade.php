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
                <form action="{{ route('admin.live-video.update',$video->id) }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    @method('PUT')
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;"><i class="mdi mdi-content-save"></i> Update Video </button>
                    </div>
                    <div class="card-body">
                        <div class="row" id="addRowHere">
                            <div class="col-md-9 mx-auto">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Video Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="">Serial</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'serial','value'=>$video->serial,'placeholder'=>'Serial Number ...'])
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Video Title</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'title','value'=>$video->title,'placeholder'=>'Video Title ...'])
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Video Link</label>
                                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'link','value'=>$video->link,'placeholder'=>'Video Link ...'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
