@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course : {{ $course->title  ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.chapters.update',$chapter->id) }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    @method('PUT')
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ route('admin.chapters.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;">
                            <i class="mdi mdi-content-save"></i> Update Class
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered border border-dark">
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Free Status <code>Check For Free</code></th>
                                </tr>
                                <tbody id="myTable">
                                <tr>
                                    <td>
                                        @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'serial','placeholder'=>'Serial Number','value'=>$chapter->serial ?? ''])
                                    </td>
                                    <td>
                                        @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'name','placeholder'=>'Chapter Name','value'=>$chapter->name ?? ''])
                                    </td>
                                    <td>
                                        <div class="form-check form-checkbox-secondary mb-2 d-flex">
                                            <input type="checkbox" value="1" id="is_free" name="is_free" {{ $chapter->is_free == 1 ? 'checked' : '' }} data-switch="secondary"/>
                                            <label for="is_free" data-on-label="Yes" data-off-label="No"></label>
                                            <label class="form-check-label fw-bolder" style="cursor: pointer" for="is_free">Check Free Status</label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
