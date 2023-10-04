@extends('backend.admin.pages.setting.all_setting')
@section('setting_title',$title)
@section('setting_content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Change Email</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.change-email') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-dark">Your Old Email Address<span class="text-danger fw-bold">*</span>:</p>
                                @include('backend.admin.components.form_element.input',['type'=>'email','name'=>'old_email','required'=>'required','placeholder'=>'Old Email Address'])
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-dark">Your New Email Address<span class="text-danger fw-bold">*</span>:</p>
                                @include('backend.admin.components.form_element.input',['type'=>'email','name'=>'new_email','required'=>'required','placeholder'=>'New Email Address'])
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-dark">Your Password<span class="text-danger fw-bold">*</span>:</p>
                                @include('backend.admin.components.form_element.input',['type'=>'password','name'=>'password','required'=>'required','placeholder'=>'Password'])
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <li class="next list-inline-item float-end">
                                    <button href="#" class="btn btn-dark">Change Email</button>
                                </li>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Change Password</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.change-password') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-dark">Your Old password<span class="text-danger fw-bold">*</span>:</p>
                                @include('backend.admin.components.form_element.input',['type'=>'password','name'=>'old_password','required'=>'required','placeholder'=>'Old password'])
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-dark">Your New Password<span class="text-danger fw-bold">*</span>:</p>
                                @include('backend.admin.components.form_element.input',['type'=>'password','name'=>'new_password','required'=>'required','placeholder'=>'New Password'])
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <p class="text-dark">Confirm Password <span class="text-danger fw-bold">*</span>:</p>
                                @include('backend.admin.components.form_element.input',['type'=>'password','name'=>'confirm_password','required'=>'required','placeholder'=>'Confirm Password'])
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <li class="next list-inline-item float-end">
                                    <button href="#" class="btn btn-dark">Change Password</button>
                                </li>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
