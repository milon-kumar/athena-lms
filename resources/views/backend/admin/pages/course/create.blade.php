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
                <form action="{{ route('admin.course.store') }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Course.Create')
                            <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;"><i class="mdi mdi-content-save"></i> Save Course </button>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="row" id="addRowHere">
                            <div class="col-md-12">
                                <div class="card shadow border border-secondary">
                                    <div class="card-header">
                                        <h4>Teacher's Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Insert Course Name</label>
                                            <input type="text" class="form-control" name="title" placeholder="Course Title">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Select Course Category</label>
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <div class="input-group">
                                                        <select name="category_id" class="form-control select2-search--inline" data-toggle="select2" id="">
                                                            <option selected class="d-none">Select</option>
                                                            @forelse(\App\Models\Category::where('status',1)->get() as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @empty
                                                                <option>No Category Found</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    @can('Category.Create')
                                                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                            <i class="mdi mdi-plus"></i>
                                                        </button>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Course Image</label>
                                            <input type="file" class="form-control dropify" name="image" placeholder="Course Image">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-checkbox-secondary mb-2 d-flex">
                                                <input type="checkbox"
                                                       name="is_popular"
                                                       value="true" id="is_popular"
                                                       data-switch="secondary"/>
                                                <label for="is_popular" data-on-label="Yes" data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                                <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;" for="is_popular">Check This Button For Make Popular This Course</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Regular Course Fee</label>
                                            <input type="number" class="form-control" name="regular_course_fee" placeholder="Regular Course Fee">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Discount</label>
                                            <input type="number" class="form-control" name="discount_fee" placeholder="Discount">
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.category.store') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header modal-colored-header bg-dark text-white">
                    <h4 class="modal-title" id="categoryAddModal">Add Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="" class="col-3 col-form-label">Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Category Name">
                            @error('name')
                            <small class="text-danger"></small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="mdi mdi-close"></i> Close</button>
                    <button type="submit"  class="btn btn-dark"><i class="mdi mdi-content-save"></i> Save changes</button>
                </div>
            </form><!-- /.modal-content -->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

@endsection
