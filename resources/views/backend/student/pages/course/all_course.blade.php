@extends('backend.student.layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 card bg-dark text-white text-center">
            <div class="card-body">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach($user->approvedCourses as $enrole)

                                    <div class="col-md-4 mx-2  d-flex">
                                        <a
                                            @if($enrole->pivot->is_suspend)
                                                onclick="sespendMessage()"
                                            @else
                                                @if($enrole->deactive)
                                                    onclick="alertMessage()"
                                                @else
                                                    onclick="changeCourse({{ $enrole->id }})"
                                                @endif
                                            @endif
                                        >
                                            <form action="{{ route('student.change-course',$enrole->id) }}"
                                                  id="changeCourse-{{$enrole->id}}" method="post">@csrf @method('DELETE')</form>

                                            <div class="card border border-secondary" style="border: 1px solid #d0d0d0">
                                            <div class="btn btn-success rounded-circle position-absolute d-flex justify-content-center align-content-center" style="width: 30px;height: 30px;{{ Auth::user()->selected_course_id == $enrole->id ? 'display: block!important;' : 'display: none!important;' }}">
                                                <i class="mdi mdi-check-all"></i>
                                            </div>
                                            @if($enrole->image)
                                                <div class="" style="width: 100%;height: 210px;">
                                                    <img style="width: 100%;height: 100%;" src="{{ asset($enrole->image) }}" alt="">
                                                </div>
                                            @else
                                                <img src="{{ asset(config('filesystems.noimage')) }}" alt="">
                                            @endif
                                            <div class="card-body">

                                                <h4 class="fw-bold">{{ Str::limit($enrole->title,40) ?? '' }}</h4>
                                                <small style="font-size: 15px;" class="text-success mb-1 d-block fw-bold">Remaining Course {{ $enrole->remaning }} Days</small><br/>
                                                <a class="mt-2" href="javascript:void(0)">
                                                    <del style="font-size: 18px;" class="text-danger fw-bolder">BDT{{$enrole->regular_course_fee}}</del> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-size: 18px;" class="fw-bolder text-primary">BDT {{ $enrole->full_course_fee }}</span>
                                                </a>

                                                <input type="hidden" value="{{ url('/details/'.$enrole->slug) }}" id="copyLink">
                                                <a href="javascript:void(0);" onclick="copyLink()" class="mt-3 d-block btn btn-success btn-sm">Share Course  <i class="mdi mdi-share"></i></a>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
