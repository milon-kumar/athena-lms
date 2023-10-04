@extends('backend.admin.layouts.app')
@section('title','Profile-',$user->name ?? '')
@section('style')
    <style>
        .profileImage{
            width: 85px;
            height: 85px;
            border-radius: 50px;
            border: 2px solid white;
            overflow: hidden;
        }
        .profileImage img{
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
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <div class="profileImage text-center mx-auto mt-2">
                            <img src="{{ asset($user->image) ?? defaultImage() }}" alt="">
                        </div>
                        <div class="card-body">
                            <h4 class="mb-2">Account Type : {{ $user->type ?? "Account type" }}</h4>
                            <h4 class="mb-2">Account Holder : {{ $user->name ?? "Account holder" }}</h4>
                            <h4 class="mb-2">Phone Number : {{ $user->phone ?? "Phone number" }}</h4>

                            <a href="{{ route('admin.setting.profile.edit',$user->id) }}" class="mt-3 float-end btn btn-secondary">Manage profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
