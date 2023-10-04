<div class="col-lg-3 col-md-4 col-12">
    <!-- Side navbar -->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="fe fe-menu"></span>
        </button>
        <!-- Collapse navbar -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">
                <span class="navbar-header">Student Menu</span>
                <!-- List -->
                <ul class="list-unstyled ms-n2 mb-4">
                    <!-- Nav item -->
                    <li class="nav-item {{ Route::is('student.dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.dashboard') }}">
                            <i class="fe fe-home nav-icon"></i>
                        My Account</a>
                    </li>

                    <li class="nav-item {{ Route::is('student.courses') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.courses') }}">
                            <i class="fe fe-video nav-icon"></i>
                            My Courses
                        </a>
                    </li>
                    @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$classVideos))
                        <li class="nav-item {{ Route::is('student.chapter.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('student.chapter') }}">
                                <i class="fe fe-video nav-icon"></i>
                            View  Class Videos</a>
                        </li>
                    @endif
                    @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$liveVideos))
                        <li class="nav-item {{ Route::is('student.live-video') ? 'active' : '' }}"">
                            <a class="nav-link" href="{{ route('student.live-video') }}">
                                <i class="fe fe-video nav-icon"></i>
                                View All Live Videos</a>
                        </li>
                    @endif



                    <li class="nav-item {{ Route::is('student.buy-course') ? 'active' : '' }}">
                        <a class="nav-link"  href="{{ route('student.buy-course') }}">
                            <i class="fe fe-video nav-icon"></i>Buy New Courses</a>
                    </li>


                    @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$communityPost))
                        <li class="nav-item {{ Route::is('student.post.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('student.post.index') }}">
                                <i class="fe fe-video nav-icon"></i>Community Post</a>
                        </li>
                    @endif

                    <li class="nav-item {{ Route::is('student.complain.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.complain.index') }}">
                            <i class="fe fe-video nav-icon"></i>Complain Box</a>
                    </li>
                    @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$examsFeatures))
                        <li class="nav-item {{ Route::is('student.exam.*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('student.exam.index') }}">
                                <i class="fe fe-video nav-icon"></i>Exam & Result</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                           aria-controls="sidebarEcommerce" class="nav-link">
                            <i class="dripicons-cloud-download"></i>
                            <i class="fe fe-download nav-icon"></i> Download
                            <i class="mdi mdi-arrow-down float-end"></i>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="side-nav-second-level">
                                @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$lectureNotes))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.pdf','lecture-notes') }}">Lecture notes </a>
                                    </li>
                                @endif
                                @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$cqQuestions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.pdf','cq-questions') }}">CQ Questions</a>
                                    </li>
                                @endif
                                @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$cqQuestionsSolve))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.pdf','cq-questions-solve') }}">CQ Questions Solves</a>
                                    </li>
                                @endif
                                @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$pdfQuestions))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.pdf','pdf-questions') }}">PDF Questions</a>
                                    </li>
                                @endif
                                @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$pdfSolve))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.pdf','pdf-questions-solve') }}">PDF Solves</a>
                                    </li>
                                @endif
                                @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$omrForm))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student.pdf','omr-form-essentials') }}">Essentials</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>

                    <hr/>
                    <li class="nav-item {{ Route::is('student.progress.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.progress.index') }}">
                            <i class="mdi mdi-progress-alert nav-icon"></i>Progress Report</a>
                    </li>
                    <li class="nav-item {{ Route::is('student.invoice.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('student.invoice') }}">
                            <i class="mdi mdi-information nav-icon"></i>Invoice</a>
                    </li>
                </ul>
{{--                <span class="navbar-header">Account Settings</span>--}}
{{--                <!-- List -->--}}
{{--                <ul class="list-unstyled ms-n2 mb-0">--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="profile-edit.html"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>--}}
{{--                    </li>--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="security.html"><i class="fe fe-user nav-icon"></i>Security</a>--}}
{{--                    </li>--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="social-profile.html"><i class="fe fe-refresh-cw nav-icon"></i>Social--}}
{{--                            Profiles</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="notifications.html"><i class="fe fe-bell nav-icon"></i>Notifications</a>--}}
{{--                    </li>--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="profile-privacy.html"><i class="fe fe-lock nav-icon"></i>Profile--}}
{{--                            Privacy</a>--}}
{{--                    </li>--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="delete-profile.html"><i class="fe fe-trash nav-icon"></i>Delete--}}
{{--                            Profile</a>--}}
{{--                    </li>--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link " href="linked-accounts.html"><i class="fe fe-user nav-icon"></i>Linked Accounts</a>--}}
{{--                    </li>--}}
{{--                    <!-- Nav item -->--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="../index.html"><i class="fe fe-power nav-icon"></i>Sign Out</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </nav>
</div>
