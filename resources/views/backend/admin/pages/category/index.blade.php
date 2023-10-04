@extends('backend.admin.layouts.app')
@section('title','All Students')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">All Category <span class="badge badge-success-lighten">{{$categories->count()}}</span></h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Has Course</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>#{{ $loop->iteration }}</td>
                                                <td>{{ optional($category)->name }}</td>
                                               <td>
                                                   <a href="{{route('admin.category.unpublished',$category->id)}}">
                                                       <span class="badge badge-success-lighten">Published</span>
                                                   </a>
                                               </td>
                                                <td>
                                                    <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('deleteForm{{ $category->id }}').submit()" class="btn btn-danger btn-sm">Delete</a>
                                                    <form action="{{ route('admin.category.destroy',$category->id) }}" method="post" id="deleteForm{{$category->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-3 col-form-label">Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Category Name">
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
            </div>
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
