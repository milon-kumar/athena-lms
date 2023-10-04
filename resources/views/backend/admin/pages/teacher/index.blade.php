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
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>Teacher Name</th>
                                <th class="text-center">Image</th>
                                <th>Phone</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <th>{{ $teacher->name ?? '' }}</th>
                                        <td>
                                            <div class="" style="width: 65px;height: 65px;overflow: hidden;border-radius: 50px;">
                                                <img style="width: 100%;height: 100%;" src="{{ asset($teacher->image) ?? defaultImage() }}" alt="{{ $teacher->name }}">
                                            </div>
                                        </td>
                                        <td>{{ $teacher->phone ?? '' }}</td>
                                        <td>
                                            @can('Teacher.Edit')
                                                <a href="{{ route('admin.teacher.edit',$teacher->id) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                            @endcan
                                            @can('Teacher.Delete')
                                                    <a href="Javascript:void(0);" onclick="deleteData({{ $teacher->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                                    <form action="{{ route('admin.teacher.destroy',$teacher->id) }}" id="delete-form-{{$teacher->id}}" method="post">@csrf @method('DELETE')</form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
