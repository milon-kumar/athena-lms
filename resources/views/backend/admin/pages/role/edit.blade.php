@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 card shadow border mt-3">
                <div class="card-body">
                    <h2 class="d-inline-block">{{ $title }}</h2>
                    <a href="{{ url()->previous() }}" class="btn btn-danger float-end"><i class="mdi mdi-arrow-left"> </i> Go Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.role.update',$role->id) }}" method="post" class="col-12 mt-3 card">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" value="{{ $role->name ?? '' }}" class="form-control border @error('name') is-invalid border-danger @else border-dark  @enderror" name="name" required placeholder="Role Name">
                            <button class="btn btn-dark" type="submit"><i class="mdi mdi-content-save"></i> Update Role</button>

                        </div>
                        <div class="">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <hr class="border border-dark" />
                    <div class="row">
                        @foreach($permissions as $key => $permission)
                            <div class="col-md-3 mb-2">
                                <div class="card h-100 border">
                                    <div class="card-header bg-dark text-white">
                                        <h5>{{ $key }}</h5>
                                    </div>
                                    <div class="card-body">
                                        @foreach($permission as $single_permission)
                                            <div class="d-flex align-items-center mb-2">
                                                <input style="cursor: pointer;" type="checkbox" name="permissions[]"
                                                       @foreach($role->permissions as $r_permission)
                                                           {{ $single_permission->name ==  $r_permission->name ? 'checked' : ''}}
                                                       @endforeach
                                                       value="{{ $single_permission->name }}" id="{{ $single_permission->name.$loop->iteration }}" data-switch="secondary"/>
                                                <label for="{{ $single_permission->name.$loop->iteration }}" data-on-label="Yes" data-off-label="No"></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label style="cursor: pointer;" class="fw-bolder" for="{{ $single_permission->name.$loop->iteration }}">{{ $single_permission->name ?? '' }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
