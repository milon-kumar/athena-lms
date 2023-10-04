@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block">{{ $title }}</h2>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-dark float-end"><i class="mdi mdi-plus"> </i> Add User To Role</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <table class="table table-bordered border-dark">
                    <tr class="bg-dark text-white" style="background: #494646;">
                        <th>#SL</th>
                        <th>User Name</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name ?? '' }}</td>
                            <td style="width: 35%;">
                                @foreach($user->roles as $role)
                                    <span class="badge badge-dark-lighten rounded">{{ $role->name ?? '' }}</span>
                                @endforeach
                            </td>
                            <td style="width: 10%;">
                                <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i></a>
                                @if($user->is_delete == false)
                                    <a href="Javascript:void(0)" onclick="" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                @else
                                    <a href="Javascript:void(0)" onclick="deleteData({{ $user->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i></a>
                                    <form class="d-none" action="{{ route('admin.user.destroy',$user->id) }}" method="post" id="delete-form-{{$user->id}}">@csrf @method('DELETE')</form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div><!-- end col-->
        </div>
    </div>
@endsection
