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
            <div class="col-8">
                <form action="{{ route('admin.teacher.update',$teacher->id) }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    @method('put')
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;"><i class="mdi mdi-content-save"></i> Save Teacher </button>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Image ( W-255 by H-170 ) <span class="text-danger font-weight-bold">*</span></label>
                            <div class="col-9">
                                <input type="file"
                                       class="form-control"
                                       placeholder="Teacher Image"
                                       name="image"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Full Name - Line One <span class="text-danger font-weight-bold"> * </span></label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Teacher full name"
                                       name="name"
                                       value="{{ $teacher->name }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Line Two <span class="text-danger font-weight-bold">*</span></label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Line 2 teacher information"
                                       name="line2"
                                       value="{{ $teacher->line2 }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Line Three</label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Line 3 teacher information"
                                       name="line3"
                                       value="{{ $teacher->line3  }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Line Fore</label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Line 4 teacher information"
                                       name="line4"
                                       value="{{ $teacher->line4 ?? " line4" }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Line Five</label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Line 5 teacher information"
                                       name="line5"
                                       value="{{ $teacher->line5 ?? " line5" }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Serial</label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Teacher serial number"
                                       name="serial"
                                       value="{{ $teacher->serial ?? " serial" }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Facebook Page URL</label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Teacher facebook page url"
                                       name="fb_page"
                                       value="{{ $teacher->fb_page ?? " Facebook Page URL " }}"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-3 col-form-label">Youtube Channel</label>
                            <div class="col-9">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Youtube channel"
                                       name="youtube_chanel"
                                       value="{{ $teacher->youtube_chanel ?? " Youtube Channel" }}"
                                >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <img class="img-fluid" src="{{ asset($teacher->image) ?? defaultImage() }}" alt="{{ $teacher->name ??"Teacher Name" }}">
            </div>
        </div>
    </div>
@endsection
