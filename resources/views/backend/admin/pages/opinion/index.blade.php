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
                        <h3 class="header-title d-inline-block">All Opinions<span class="badge badge-success-lighten">{{ $opinions->count() ?? 0 }}</span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Teacher.Create')
                            <a href="{{ route('admin.opinion.create') }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Opinion</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped border border-dark text-dark">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th class="text-center">Image</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($opinions as $key => $opinion)
                                <tr>
                                    <td>
                                        <a href="">{{ $loop->iteration }}</a>
                                    </td>
                                    <td class="text-center mx-auto">
                                        <div class="text-center mx-auto" style="width: 65px;height: 65px;overflow: hidden;border-radius: 50px;">
                                            <img class="text-center" src="{{ asset($opinion->image) ?? defaultImage() }}" style="width: 100%;height: 100%;" alt="Opinion Image">
                                        </div>
                                    </td>
                                    <td>
                                        {!! Str::limit($opinion->description,500) !!}
                                    </td>
                                    <td class="text-center">
                                        @can('Opinion.Edit')
                                            <a href="{{ route('admin.opinion.edit',$opinion->id) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                        @endcan
                                        @can('Opinion.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $opinion->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                            <form action="{{ route('admin.opinion.destroy',$opinion->id) }}" id="delete-form-{{$opinion->id}}" method="post">@csrf @method('DELETE')</form>
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
