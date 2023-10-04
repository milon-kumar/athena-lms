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
                <form action="{{ route('admin.faq.store') }}" method="post" class="card border shadow">
                    @csrf
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;">
                            <i class="mdi mdi-content-save"></i> Save Faq
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="title">Faq Title : <span class="text-danger fw-bolder">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label for="description">Faq Details : <span class="text-danger fw-bolder">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="description" id="description" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
