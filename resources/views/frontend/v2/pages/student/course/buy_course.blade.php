@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @php
        $user = auth()->user();
    @endphp
    @if(true)
        <div class="row">
            @forelse($courses as $course)
                <div class="col-lg-4 col-md-4 col-12 mb-3">
                    @include('frontend.v2.components.course.course_card')
                </div>
            @empty
                <div class="row my-5">
                    <div class="col-md-12">
                        <h1 class="text-center">No Course Found</h1>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $courses->links() !!}
            </div>
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

