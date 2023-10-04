@extends('backend.admin.layouts.app')
@section('title','Profile-',$user->name ?? '')
@section('style')
    <style>
        .profileImage {
            width: 85px;
            height: 85px;
            border-radius: 50px;
            border: 2px solid white;
            overflow: hidden;
        }

        .profileImage img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
@endsection
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
                <div class="card bg-dark text-white border shadow text-center p-4">
                    <div class="profileImage mx-auto">
                        <img src="{{ asset($user->image) ?? defaultImage() }}" alt="">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 mx-auto">
                                <form action="{{ route('admin.setting.profile.update',$user->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Account Type</label>
                                        <div class="col-9">
                                            <input type="text" readonly disabled class="form-control bg-dark" value="{{ $user->type ?? "Account tpe" }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-3 col-form-label">Account Holder</label>
                                        <div class="col-9">
                                            <input type="text" name="name" class="form-control bg-dark" value="{{ $user->name  ?? old('name') }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-3 col-form-label">Phone Number</label>
                                        <div class="col-9">
                                            <input type="text" name="phone" class="form-control bg-dark" value="{{ $user->phone ?? "Phone number" }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-3 col-form-label">Upload Profile Image</label>
                                        <div class="col-9">
                                            <div class="input-group mb-3">
                                                <input type="file" name="image" class="form-control bg-dark">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-secondary float-end">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
