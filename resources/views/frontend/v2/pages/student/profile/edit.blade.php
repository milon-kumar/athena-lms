@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @php
        $user = auth()->user();
    @endphp
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Profile Details</h3>
                    <p class="mb-0">
                        You have full control to manage your own account setting.
                    </p>

                </div>
                <!-- Card body -->
                <form action="{{ route('student.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center mb-4 mb-lg-0">
                                <img src="{{ asset($user->image) ?? defaultImage() }}" id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar">
                                <div class="ms-3">
                                    <h4 class="mb-0">Your avatar</h4>
                                    <p class="mb-0">
                                        Profile Picture(100KB max 360 by 360 pixels)
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label for="" class="d-block form-label">Select Profile Image</label>
                                <input type="file"
                                       id="FileId"
                                       class="form-control btn btn-outline-primary btn-sm"
                                       name="image"
                                >
                                {{--                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>--}}
                            </div>
                        </div>
                        <hr class="my-5">
                        <div>
                            <h4 class="mb-0">Personal Details</h4>
                            <p class="mb-4">
                                Here your personal information and address.
                            </p>
                            <!-- Form -->
                            <div class="row gx-3">
                                <!-- First name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="name">Full Name <span class="text-danger fw-bold">*</span></label>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Full Name"
                                           value="{{ $user->name ?? old('name') }}"
                                    >
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Last name -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="phone">Contact No <span class="text-danger fw-bold">*</span></label>
                                    <input type="text"
                                           id="phone"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ $user->phone ?? old('phone') }}"
                                           placeholder="01* ** *** ***">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Phone -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="others_phone">Others Contact No</label>
                                    <input type="text"
                                           id="others_phone"
                                           name="others_phone"
                                           class="form-control @error('others_phone') is-invalid @enderror"
                                           placeholder="01* ** *** ***"
                                           value="{{ $user->others_phone ?? old('others_phone') }}"
                                    >
                                    @error('others_phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Birthday -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="father_name">Father’s Name (বাবার নাম)</label>
                                    <input type="text"
                                           id="father_name"
                                           name="father_name"
                                           class="form-control @error('father_name') is-invalid @enderror"
                                           placeholder="Father Name"
                                           value="{{ $user->father_name ?? old('father_name') }}"
                                    >
                                    @error('father_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="mother_name">Mother’s Name (বাবার নাম)</label>
                                    <input type="text"
                                           id="mother_name"
                                           name="mother_name"
                                           class="form-control @error('mother_name') is-invalid @enderror"
                                           placeholder="Mother Name"
                                           value="{{ $user->mother_name ?? old('mother_name') }}"
                                    >
                                    @error('mother_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Address -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="thana">Your Thana(আপনার থানা)</label>
                                    <input type="text"
                                           id="thana"
                                           name="thana"
                                           class="form-control @error('thana') is-invalid @enderror"
                                           placeholder="Your Thana"
                                           value="{{ $user->thana ?? old('thana') }}"
                                    >
                                    @error('thana')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- State -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="district">Your District (আপনার জেলা) </label>
                                    <input type="text"
                                           id="district"
                                           name="district"
                                           class="form-control @error('district') is-invalid @enderror"
                                           placeholder="Your District"
                                           value="{{ $user->district ?? old('district') }}"
                                    >
                                    @error('district')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Country -->
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="institute">Name of School/College(আপনার স্কুল বা কলেজের নাম) </label>
                                    <input type="text"
                                           id="institute"
                                           name="institute"
                                           class="form-control @error('institute') is-invalid @enderror"
                                           placeholder="Name of Institute"
                                           value="{{ $user->institute ?? old('institute') }}"
                                    >
                                    @error('institute')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="submit">
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
