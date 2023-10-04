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
            <form action="{{ route('admin.user.update',$user->id) }}" method="post" class="col-8 mx-auto mt-3 card border border-secondary">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Select Role</label>
                            <select class="form-control border border-secondary" name="role" data-placeholder="Select Role" required>
                                <option class="d-none" selected>~~~Select Role~~~</option>
                                @foreach($roles as $role)
                                    <option @foreach($user->roles as $u_role)
                                                {{ $u_role->name == $role->name ? 'selected' : '' }}
                                            @endforeach
                                            value="{{ $role->name ?? '' }}">{{ $role->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">User Name</label>
                            @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'name','placeholder'=>'User Name','required'=>'required','value'=>$user->name])
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Email Address</label>
                            @include('backend.admin.components.form_element.input',['type'=>'email','name'=>'email','placeholder'=>'Email Address','required'=>'required','value'=>$user->email,'readonly'=>'readonly'])
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark float-end">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
