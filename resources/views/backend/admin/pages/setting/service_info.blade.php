@extends('backend.admin.pages.setting.all_setting')
@section('setting_title',$title)
@section('setting_content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="{{ route('admin.setting.update') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline-block">Your content</h3>
                        <button class="btn btn-dark float-end" type="submit">Update Now</button>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#course_content_service" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Course</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#service_info_student" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Student</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#service_info_student_instructor" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Instructor</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="course_content_service">
                                <div class="mb-2">
                                    <input type="hidden" name="types[]" value="service_info_course_title">
                                    <input type="text" class="form-control" name="service_info_course_title" placeholder="Course Service Title" value="{{ get_setting('service_info_course_title') }}">
                                </div>
                                <div class="">
                                    <input type="hidden" name="types[]" value="service_info_course_sub_title">
                                    <input type="text" class="form-control" name="service_info_course_sub_title" placeholder="Course Service Sub Title" value="{{ get_setting('service_info_course_sub_title') }}">
                                </div>
                            </div>
                            <div class="tab-pane" id="service_info_student">
                                <div class="mb-2">
                                    <input type="hidden" name="types[]" value="service_info_student_title">
                                    <input type="text" class="form-control" name="service_info_student_title" placeholder="Student Service Title" value="{{ get_setting('service_info_student_title') }}">
                                </div>
                                <div class="">
                                    <input type="hidden" name="types[]" value="service_info_student_sub_title">
                                    <input type="text" class="form-control" name="service_info_student_sub_title" placeholder="Student Service Sub Title" value="{{ get_setting('service_info_student_sub_title') }}">
                                </div>
                            </div>
                            <div class="tab-pane" id="service_info_student_instructor">
                                <div class="mb-2">
                                    <input type="hidden" name="types[]" value="service_info_instructor_title">
                                    <input type="text" class="form-control" name="service_info_instructor_title" placeholder="Instructor Service Title" value="{{ get_setting('service_info_instructor_title') }}">
                                </div>
                                <div class="">
                                    <input type="hidden" name="types[]" value="service_info_instructor_sub_title">
                                    <input type="text" class="form-control" name="service_info_instructor_sub_title" placeholder="Instructor Service Sub Title" value="{{ get_setting('service_info_instructor_sub_title') }}">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </form>
        </div> <!-- end col -->
    </div>
@endsection
