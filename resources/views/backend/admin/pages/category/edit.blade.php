@extends('backend.admin.layouts.app')
@section('title','Category Edit')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="" class="col-3 col-form-label">Name</label>
                                <div class="col-9">
                                    <input type="text" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Category Name">
                                    @error('name')
                                    <small class="text-danger"></small>
                                    @enderror
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        <!-- end row-->
    </div> <!-- container -->
@endsection
