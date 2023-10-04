@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course : {{ $course->title ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}<span class="badge badge-success-lighten">{{$codes->count()}}</span></h3>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Access Code</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($codes as $key => $code)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $code->user->name ?? "Student name" }}</td>
                                    <td>{{ $code->user->phone ?? "Phone Number" }}</td>
                                    <td>{{ $code->user->email ?? "Email Address" }}</td>
                                    <td>{{ $code->code ?? "Access Code" ?? "Email Address" }}</td>
                                    <td class="text-left">
                                        @can('FB_Group_Access_Code')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $code->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete</a>
                                            <form action="{{ route('admin.fb-group-access-code.delete',$code->id) }}" id="delete-form-{{$code->id}}" class="d-none" method="post">@csrf @method('DELETE')</form>
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
