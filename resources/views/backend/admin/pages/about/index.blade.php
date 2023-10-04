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
                        <h3 class="header-title d-inline-block">আমাদের কথা <span class="badge badge-success-lighten"></span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('admin.setting.update') }}" method="post" class="col-6 mt-3 px-3">
                                @csrf
                                <div class="card h-100 border border-dark">
                                    <div class="card-header bg-dark text-white">
                                        <h4>Our Message</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="types[]" value="our_youtube_message">
                                        @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'our_youtube_message','value'=>get_setting('our_youtube_message'),'placeholder'=>'Input YouTube Video ID Here'])
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark btn-sm float-end">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('admin.setting.update') }}" method="post" class="col-6 mt-3 px-3">
                                @csrf
                                <div class="card h-100 border border-dark">
                                    <div class="card-header bg-dark text-white">
                                        <h4>Description</h4>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="types[]" value="our_home_description">
                                        <textarea name="our_home_description" class="form-control" rows="5" placeholder="Insert text 5000 characters max">{!! get_setting('our_home_description') !!}</textarea>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark btn-sm float-end">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
