<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{route('student.dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}backend/assets/images/logo.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('/')}}backend/assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('student.dashboard')}}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}backend/assets/images/logo-dark.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('/')}}backend/assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-user"></i>
                    <span> Profile </span>
                </a>
            </li>
            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$communityPost))
                <li class="side-nav-item">
                    <a href="{{ route('student.post.index') }}" class="side-nav-link">
                        <i class="dripicons-blog"></i>
                        <span> Community Post </span>
                    </a>
                </li>
            @endif
            <li class="side-nav-item">
                <a href="{{ route('student.courses') }}" class="side-nav-link">
                    <i class="dripicons-checklist"></i>
                    <span> My Courses </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.buy-course') }}" class="side-nav-link">
                    <i class="dripicons-shopping-bag"></i>
                    <span> Buy New Courses </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-graph-line"></i>
                    <span> Progress Report </span>
                </a>
            </li>
            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$classVideos))
            <li class="side-nav-item">
                <a href="{{ route('student.chapter') }}" class="side-nav-link bg-danger text-white">
                    <i class="dripicons-media-play"></i>
                    <span> View all Class Videos </span>
                </a>
            </li>
            @endif

            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$liveVideos))
                <li class="side-nav-item">
                    <a href="{{ route('student.live-video') }}" class="side-nav-link bg-warning text-white">
                        <i class="dripicons-media-play"></i>
                        <span> View All Live Videos </span>
                    </a>
                </li>
            @endif


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="dripicons-cloud-download"></i>
                    <span> Download </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$lectureNotes))
                            <li>
                                <a href="{{ route('student.pdf','lecture-notes') }}">Lecture notes </a>
                            </li>
                        @endif
                            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$cqQuestions))
                            <li>
                                <a href="{{ route('student.pdf','cq-questions') }}">CQ Questions</a>
                            </li>
                        @endif
                            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$cqQuestionsSolve))
                            <li>
                                <a href="{{ route('student.pdf','cq-questions-solve') }}">CQ Questions Solves</a>
                            </li>
                        @endif
                            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$pdfQuestions))
                            <li>
                                <a href="{{ route('student.pdf','pdf-questions') }}">PDF Questions</a>
                            </li>
                        @endif
                            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$pdfSolve))
                            <li>
                                <a href="{{ route('student.pdf','pdf-questions-solve') }}">PDF Solves</a>
                            </li>
                        @endif
                            @if(getCFeturedStudent(Auth::user()->selected_course_id, \App\Helper\Propertis::$omrForm))
                            <li>
                                <a href="{{ route('student.pdf','omr-form-essentials') }}">Essentials</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.complain.index') }}" class="side-nav-link">
                    <i class="dripicons-information"></i>
                    <span> Complain Box </span>
                </a>
            </li>
        </ul>

        <!-- Help Box -->
{{--        @include('backend.admin.components.helpbox')--}}
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
