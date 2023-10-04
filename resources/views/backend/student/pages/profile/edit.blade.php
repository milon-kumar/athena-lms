@extends('backend.student.layouts.app')
@section('title','Enrolement')
@section('content')
    <div class="main-content">
        <div class="">
            <div class="container">
                <div class="row my-4">
                    <div class="col-xl-12">
                        <div class="card border border-secondary">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('student.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <h4 class="header-title mb-3">Profile Details</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Your Name (আপনার নাম)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'name','value'=>$user->name ?? '','required'=>'required','placeholder'=>'Your Name'])
                                            </div>
                                            <div class="col-10 col-md-4">
                                                <p class="text-dark">Upload Profile Picture <code class="fw-bolder text-danger">(100KB max 360 by 360 pixels)</code> Upload<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Profile Image'])
                                            </div>
                                            <div class="col-2 col-md-2" style="margin-top: 59px;">
                                                <div class="" style="width: 45px;height: 45px;overflow: hidden;border-radius: 50px;">
                                                    <img class="img-fluid" src="{{ $user->image ? asset($user->image) : asset('images/user.webp')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Contact No (আপনার ফোন নাম্বার) <span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'number','value'=>$user->phone ?? '','name'=>'phone','required'=>'required','placeholder'=>'Your Contract Number'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Others Contact No (অন্য ফোন নাম্বার) <code class="fw-bolder text-success">(Optional)</code>  :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'number','value'=>$user->others_phone ?? '','name'=>'others_phone','placeholder'=>'Others Contract Number'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Father’s Name (বাবার নাম)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'father_name','value'=>$user->father_name ?? '','required'=>'required','placeholder'=>'Father Name'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Mother’s Name (মা এর নাম)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'mother_name','value'=>$user->mother_name ?? '','placeholder'=>'Mother Name'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Your Thana(আপনার থানা) <code class="fw-bolder text-success">(Optional)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'thana','value'=>$user->thana ?? '','required'=>'required','placeholder'=>'Your Thana'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Your District (আপনার জেলা)  <code class="fw-bolder text-success">(Optional)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'district','value'=>$user->district ?? '','placeholder'=>'Your District'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <p class="text-dark">Name of School/College(আপনার স্কুল বা কলেজের নাম)*:<code class="fw-bolder text-success">(Optional)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'institute','value'=>$user->institute ?? '','placeholder'=>'Name of School/College'])
                                            </div>
                                        </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <li class="next list-inline-item float-end">
                                                <button href="#" class="btn btn-dark">Update Profile</button>
                                            </li>
                                        </div>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('/')}}backend/assets/js/pages/demo.form-wizard.js"></script>
@endsection
