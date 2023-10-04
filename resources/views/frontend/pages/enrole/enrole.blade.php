@extends('frontend.layout.app')
@section('title','Enrolement')
@section('content')
    <div class="main-content">
        <div class="breadcome py-5" style="background: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url({{ asset('/frontend/img/bred3.jpg')}}) no-repeat ;background-size: cover;">
            <div class="container">
                <h2 class="text-center text-white">All Instructor</h2>
                <p class="text-center text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci assumenda eligendi error eum incidunt, modi, nesciunt obcaecati placeat quasi rerum saepe ullam! Asperiores atque deserunt, dolores qui quos rem.</p>
            </div>
        </div>
        <div class="">
            <!-- Start Content-->
            <div class="container">
                <div class="row my-4">
                    <div class="col-xl-12">
                        <div class="card border border-secondary">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('frontend.enrole.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(auth()->user() == !null)
                                        <h4 class="header-title mb-3">Payment Details</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Payment Method Bkash/Nagad/Rocket (কিভাবে পেমেন্ট করেছেন বিকাস/নগদ/রকেট)<span class="text-danger fw-bold">*</span>:</p>
                                                <select name="method" class="form-control" id="">
                                                    <option value="bkash">Bkash</option>
                                                    <option value="nogod">Nogod</option>
                                                    <option value="rocket">Rocket</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">From which number you paid (কোন নাম্বার হতে কোর্স ফি দিয়েছেন লিখবেন):</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'number','placeholder'=>'Payment Number'])
                                                @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'course_id','value'=>$course_id])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Payment Transition ID (পেমেন্ট এর ট্রানজেকশন আইডি লিখবেন):</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'transition_id','placeholder'=>'Transition Id'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Date and Time of Payment (পেমেন্ট এর তারিখ ও সময় লিখবেন)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'datetime-local','name'=>'date','required'=>'required','placeholder'=>'Payment Date And Time'])
                                            </div>
                                        </div>

                                    @else
                                        <h4 class="header-title mb-3">Account Details</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">User Name<code class="fw-bolder text-success">(Example123)</code> <span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'user_name','required'=>'required','placeholder'=>'User Name'])
                                                @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'course_id','value'=>$course_id])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Email Address<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'email','name'=>'email','required'=>'required','placeholder'=>'Email Address'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Password<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'password','name'=>'password','required'=>'required','placeholder'=>'Password'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Confirm Password<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'password','name'=>'password_confirmation','required'=>'required','placeholder'=>'Confirm Password'])
                                            </div>
                                        </div>

                                        <hr class="border border-dark"/>

                                        <h4 class="header-title mb-3">Payment Details</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Payment Method Bkash/Nagad/Rocket (কিভাবে পেমেন্ট করেছেন বিকাস/নগদ/রকেট)<span class="text-danger fw-bold">*</span>:</p>
                                                <select name="method" class="form-control" id="">
                                                    <option value="bkash">Bkash</option>
                                                    <option value="nogod">Nogod</option>
                                                    <option value="rocket">Rocket</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">From which number you paid (কোন নাম্বার হতে কোর্স ফি দিয়েছেন লিখবেন):</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'number','placeholder'=>'Payment Number'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Payment Transition ID (পেমেন্ট এর ট্রানজেকশন আইডি লিখবেন):</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'transition_id','placeholder'=>'Transition Id'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Date and Time of Payment (পেমেন্ট এর তারিখ ও সময় লিখবেন)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'datetime-local','name'=>'date','required'=>'required','placeholder'=>'Payment Date And Time'])
                                            </div>
                                        </div>
                                        <hr class="border border-dark"/>

                                        <h4 class="header-title mb-3">Profile Details</h4>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Your Name (আপনার নাম)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'name','required'=>'required','placeholder'=>'Your Name'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Upload Profile Picture <code class="fw-bolder text-danger">(100KB max 360 by 360 pixels)</code> Upload:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'file','name'=>'image','placeholder'=>'Profile Image'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Contact No (আপনার ফোন নাম্বার) <span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'phone','required'=>'required','placeholder'=>'Your Contract Number'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Others Contact No (অন্য ফোন নাম্বার) <code class="fw-bolder text-success">(Optional)</code>  :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'others_phone','placeholder'=>'Others Contract Number'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Father’s Name (বাবার নাম)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'father_name','required'=>'required','placeholder'=>'Father Name'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Mother’s Name (মা এর নাম)<span class="text-danger fw-bold">*</span>:</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'mother_name','placeholder'=>'Mother Name'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Your Thana(আপনার থানা) <code class="fw-bolder text-success">(Optional)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'thana','placeholder'=>'Your Thana'])
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Your District (আপনার জেলা)  <code class="fw-bolder text-success">(Optional)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'district','placeholder'=>'Your District'])
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Name of School/College(আপনার স্কুল বা কলেজের নাম):<code class="fw-bolder text-success">(Optional)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'institute','placeholder'=>'Name of School/College'])
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <p class="text-dark">Apply Discount Code<code class="fw-bolder text-success">(if you have discount code then apply)</code> :</p>
                                                @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'discount_code','placeholder'=>'Discount Code'])
                                            </div>
                                        </div>

                                    @endif

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <li class="next list-inline-item float-end">
                                                <button href="#" class="btn btn-dark">Submit Enrole Form</button>
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
