@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block">{{ $title }}</h2>
                    <a href="{{ route('admin.role.create') }}" class="btn btn-dark float-end"><i class="mdi mdi-plus"> </i> Add New Role</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <table class="table table-bordered border-dark">
                    <tr class="bg-dark text-white" style="background: #494646;">
                        <th>#SL</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name ?? '' }}</td>
                            <td style="width: 75%;">
                                @foreach($role->permissions as $permission)
                                    <span class="badge badge-dark-lighten rounded">{{ $permission->name ?? '' }}</span>
                                @endforeach
                            </td>
                            <td style="width: 10%;">
                                @if($role->name == 'Super_Admin')
                                    <a href="Javascript:void(0)" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                    <a href="Javascript:void(0)" onclick="" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                @else
                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                    <a href="Javascript:void(0)" onclick="deleteData({{ $role->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                    <form class="d-none" action="{{ route('admin.role.destroy',$role->id) }}" method="post" id="delete-form-{{$role->id}}">@csrf @method('DELEte')</form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div><!-- end col-->
        </div>
    </div>
@endsection
