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
            <div class="col-6 mx-auto">
                <form action="{{ route('admin.opinion.update',$opinion->id) }}" method="post" class="card border shadow" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline-block">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="serial" class="form-label">Serial</label>
                            <input type="number" id="serial" name="serial" value="{{ $opinion->serial ?? '' }}" class="form-control border border-dark" placeholder="Slider Serial Number">
                            @include('backend.admin.components.form_element.input_error',['name'=>'serial'])
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" name="image" class="form-control border border-dark">
                            @include('backend.admin.components.form_element.input_error',['name'=>'image'])
                            <div class="col-4" style="width: 150px;height: 150px;border-radius: 10px;overflow: hidden;">
                                <img style="width: 100%;height: 100%;" class="img-fluid" src="{{ asset($opinion->image) ?? defaultImage() }}" alt="Slider Image">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="">Description <code class="text-danger">Optional</code></label>
                            @include('backend.admin.components.form_element.textarea',['name'=>'description','rows'=>2,'value'=>$opinion->description])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
