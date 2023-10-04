@extends('frontend.v2.layout.app')
@section('content')
    <!-- Page header -->
    <section class="py-lg-6 py-4 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white display-4 mb-0">কোর্সটিতে এনরোল করো </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section class="py-6">
        <div class="container">
            <form action="{{ route('frontend.enrole.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12 mx-auto">
                        <!-- Card -->
                        <div class="card  mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Account Details</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="row gx-3">
                                    <!-- First name  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="user_name">User Name (Example123)<span class="text-danger fw-bold">*</span></label>
                                        <input type="text"
                                               id="user_name"
                                               name="user_name"
                                               value="{{ old('user_name') }}"
                                               class="form-control @error('user_name') is-invalid @enderror"
                                               placeholder="User Name" required>
                                        @error('user_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Email Address  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="email">Email Address<span class="text-danger fw-bold">*</span></label>
                                        <input type="text"
                                               id="email"
                                               name="email"
                                               value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="exampel@gmail.com" required>
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Password  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="password">Password<span class="text-danger fw-bold">*</span></label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="" required>
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Confirm Password  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="password_confirmation">Confirm Password<span class="text-danger fw-bold">*</span></label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="" required>
                                        @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="card  mb-4">
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Profile Information</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Form -->
                                <div class="row gx-3">
                                    <!-- Full name  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="name">Your Name (আপনার নাম)<span class="text-danger fw-bold">*</span></label>
                                        <input type="text" id="name"
                                               name="name"
                                               value="{{ old('name') }}"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Your Full Name" required>
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Profile Image  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="image">Profile Picture</label>
                                        <input type="file"
                                               id="image"
                                               name="image"
                                               class="form-control @error('image') is-invalid @enderror"
                                               placeholder="Profile Image">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Contract Number  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="phone">Contact No (আপনার ফোন নাম্বার) <span class="text-danger fw-bold">*</span></label>
                                        <input type="text"
                                               id="phone"
                                               name="phone"
                                               value="{{ old('phone') }}"
                                               class="form-control @error('phone') is-invalid @enderror" required placeholder="01* ** *** ***">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Password  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="others_phone">Others Contact No (অন্য ফোন নাম্বার)</label>
                                        <input type="text"
                                               id="others_phone"
                                               name="others_phone"
                                               value="{{ old('others_phone') }}"
                                               class="form-control @error('others_phone') is-invalid @enderror" placeholder="01* ** *** ***">
                                        @error('others_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Fathers name  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="father_name">Father’s Name (বাবার নাম)</label>
                                        <input type="text"
                                               id="father_name"
                                               name="father_name"
                                               value="{{ old('father_name') }}"
                                               class="form-control @error('father_name') is-invalid @enderror" placeholder="Father Name">
                                        @error('father_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Mothers name  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="mother_name">Mother’s Name (বাবার নাম)</label>
                                        <input type="text"
                                               id="mother_name"
                                               name="mother_name"
                                               value="{{ old('mother_name') }}"
                                               class="form-control @error('mother_name') is-invalid @enderror" placeholder="Mother Name">
                                        @error('mother_name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Thana  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="thana">Your Thana(আপনার থানা)</label>
                                        <input type="text" id="thana"
                                               name="thana"
                                               value="{{ old('thana') }}"
                                               class="form-control @error('thana') is-invalid @enderror" placeholder="Your Thana">
                                        @error('thana')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- District  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="district">Your District (আপনার জেলা) </label>
                                        <input type="text" id="district"
                                               name="district"
                                               value="{{ old('district') }}"
                                               class="form-control @error('district') is-invalid @enderror" placeholder="Your District">
                                        @error('district')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Name of School/College  -->
                                    <div class="mb-3 col-12 col-md-12">
                                        <label class="form-label" for="institute">Name of School/College(আপনার স্কুল বা কলেজের নাম) </label>
                                        <input type="text" id="institute"
                                               name="institute"
                                               value="{{ old('institute') }}"
                                               class="form-control @error('institute') is-invalid @enderror" placeholder="Name of Institute">
                                        @error('institute')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-success btn-lg">Proceed With Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
