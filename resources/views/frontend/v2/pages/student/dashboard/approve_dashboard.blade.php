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
                    <h3 class="mb-0">Profile Details</h3>
                    <p class="mb-0">
                        You have full control to manage your own account setting.
                    </p>
                    <a href="{{ route('student.profile.edit',$user->id) }}" class="btn btn-outline-secondary btn-sm float-end">Edit Profile</a>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div>
                        <h4 class="mb-0">Personal Details</h4>
                        <p class="mb-4">
                            Here your personal information and address.
                        </p>
                        <!-- Form -->
                        <form class="row gx-3">
                            <div class="mb-3 col-12 col-md-6">
                                <div class="form-label">Full Name</div>
                                <h5>{{ $user->name ?? 'User Name' }}</h5>
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <div class="form-label">Email Address</div>
                                <h5>{{ $user->email ?? 'example@mail.com' }}</h5>
                            </div>
                            @if(!empty($user->phone))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Phone Number</div>
                                    <h5>{{ $user->phone ?? '01* *** ** ***' }}</h5>
                                </div>
                            @endif
                            @if(!empty($user->others_phone))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Others Phone Number</div>
                                    <h5>{{ $user->others_phone ?? '01* *** ** ***' }}</h5>
                                </div>
                            @endif
                            @if(!empty($user->father_name))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Father’s Name</div>
                                    <h5>{{ $user->father_name ?? '01* *** ** ***' }}</h5>
                                </div>
                            @endif
                            @if(!empty($user->mother_name))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Mother’s Name</div>
                                    <h5>{{ $user->mother_name ?? '01* *** ** ***' }}</h5>
                                </div>
                            @endif
                            @if(!empty($user->thana))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Your Thana</div>
                                    <h5>{{ $user->thana ?? 'Your thana name' }}</h5>
                                </div>
                            @endif
                            @if(!empty($user->district))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Your District</div>
                                    <h5>{{ $user->district ?? 'Your district name' }}</h5>
                                </div>
                            @endif
                            @if(!empty($user->district))
                                <div class="mb-3 col-12 col-md-6">
                                    <div class="form-label">Name of School/College</div>
                                    <h5>{{ $user->district ?? 'Institute Name' }}</h5>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <a href="{{ route('student.chapter') }}" class="btn btn-primary btn-lg">Class Videos</a>
            <a href="{{ route('student.buy-course') }}" class="btn btn-primary btn-lg">Buy Courses</a>
            <a href="" class="btn btn-primary btn-lg">Online Exams</a>
            <a href="{{ route('student.post.index') }}" class="btn btn-primary btn-lg">Community Post</a>
            <a href="{{ route('student.complain.index') }}" class="btn btn-primary btn-lg">Complain Box</a>
        </div>
    </div>
    <div class="row mt-5">
        @foreach($user->approvedCourses as $enrole)
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card  mb-4 card-hover">
                    <a  @if($enrole->pivot->is_suspend)
                        onclick="sespendMessage()"
                        @else
                        @if($enrole->deactive)
                        onclick="alertMessage()"
                        @else
                            onclick="changeCourse({{ $enrole->id }})"
                        @endif
                        @endif
                        class="card-img-top">
                        @if($enrole->image)
                            <img src="{{ asset($enrole->image) }}" alt="course"
                                 class="card-img-top rounded-top-md">
                        @else
                            <img src="{{ asset(config('filesystems.noimage')) }}" alt="">
                        @endif
                    </a>
                    <form action="{{ route('student.change-course',$enrole->id) }}"
                          id="changeCourse-{{$enrole->id}}" method="post">@csrf @method('DELETE')</form>
                    <!-- Card body -->
                    <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 "><a href="javascript:void(0)" class="text-inherit">{{ Str::limit($enrole->title,40) ?? '' }}</a>
                        </h3>
                        <!-- List inline -->
                        <ul class="mb-3  list-inline">
                            Remaining Course {{ $enrole->remaning }} Days
                        </ul>
                        <div class="lh-1">
                            <span>
                                <del style="font-size: 18px;" class="text-danger fw-bolder">BDT{{$enrole->regular_course_fee}}</del> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 18px;" class="fw-bolder text-primary">BDT {{ $enrole->full_course_fee }}</span>
                            </span>
                        </div>
                    </div>
                    <!-- Card footer -->
                    @if($user->selected_course_id == $enrole->id)
                        <div class="card-footer">
                            <div class="row align-items-center g-0 text-success">
                                <div class="col-auto">
                                    <a href="#" class="">
                                        <i class="mdi mdi-check-circle mdi-18px"></i>
                                    </a>
                                    This Course Selected Now
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')


    <script>
        function changeCourse(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't to change this course!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Change It!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('changeCourse-'+id).submit();
                }
            })
        }
        function alertMessage() {
            Swal.fire({
                title: 'Sorry!',
                text: "You course is date expired. contact administrator!",
                icon: 'warning',
            })
        }

        function sespendMessage() {
            Swal.fire({
                title: 'Sorry!',
                text: "You suspend from the course for some days. contact administrator!",
                icon: 'warning',
            })
        }

        function copyLink() {
            const url = document.getElementById('copyLink').value;
            navigator.clipboard.writeText(url);
            alert("Shear Link Copid")
        }
    </script>
@endsection
