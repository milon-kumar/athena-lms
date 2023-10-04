@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @php
        $user = auth()->user();
    @endphp
    @if(true)
    <div class="row">
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
                                    <a href="#" class="removeBookmark">
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
    @else
    <div class="table-responsive border-0 overflow-y-hidden">
        <table class="table mb-0 text-nowrap table-centered table-hover">
            <thead class="table-light">
                <tr>
                <th scope="col">
                    Courses
                </th>
                <th scope="col">
                    Instructor
                </th>
                <th scope="col">
                    STATUS
                </th>
                <th scope="col">
                    ACTION
                </th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($user->approvedCourses as $enrole)
                    <tr>
                    <td>
                        <a href="#" class="text-inherit">
                            <div class="d-flex align-items-center">
                                <div>
                                    @if($enrole->image)
                                        <img src="{{ asset($enrole->image) }}" alt="" class="img-4by3-lg rounded">
                                    @else
                                        <img src="{{ asset(config('filesystems.noimage')) }}" alt="" class="img-4by3-lg rounded">
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <h4 class="mb-1 text-primary-hover">
                                        {{ Str::limit($enrole->title,40) ?? '' }}
                                    </h4>
                                    <span class="text-muted">Added on 5 July, 2023</span>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="../../assets/images/avatar/avatar-10.jpg" alt="" class="rounded-circle avatar-xs me-2">
                            <h5 class="mb-0">Guy Hawkins</h5>
                        </div>
                    </td>
                    <td>
                        <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>Live
                    </td>
                    <td>
                        <a href="#" class="btn btn-secondary btn-sm">Change Status</a>
                    </td>
                    <td>
                                            <span class="dropdown dropstart">
                  <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button" id="courseDropdown9"
                     data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                  <i class="fe fe-more-vertical"></i>
                  </a>
                   <span class="dropdown-menu" aria-labelledby="courseDropdown9">
                      <span class="dropdown-header">Settings</span>
                        <a class="dropdown-item" href="#"><i class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
                      </span>
                    </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
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
