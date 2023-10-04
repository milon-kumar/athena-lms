<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">
        <a class="" href="{{ route('frontend.v2.home') }}">
            <img src="{{ asset('/') }}frontend/images/athena_logo.png" alt="" class="navbar-image"></a>
        <!-- Mobile view nav wrap -->

        <div class="ms-auto d-flex align-items-center order-lg-3">
            <div>
                <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </a>
            </div>

            <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
                @if(auth()->check())
                    @if(auth()->user()->type == 'student')
                        @include('frontend.v2.components.nav.notifications')
                    @endif
                @endif
                @include('frontend.v2.components.nav.account')
            </ul>
        </div>
        <div>
            <!-- Button -->
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.v2.home') ? 'active' : '' }}" href="{{ route('frontend.v2.home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.v2.all-course') ? 'active' : '' }}" href="{{ route('frontend.v2.all-course','all') }}">
                        Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.v2.instructors') ? 'active' : '' }}" href="{{ route('frontend.v2.instructors') }}">
                        Instructors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.v2.contact') ? 'active' : '' }}" href="{{ route('frontend.v2.contact') }}">
                        Contact Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.v2.community') ? 'active' : '' }}" href="{{ route('frontend.v2.community') }}">
                        Community
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.v2.faq') ? 'active' : '' }}" href="{{ route('frontend.v2.faq') }}">
                        FAQ
                    </a>
                </li>
            </ul>
            <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
                <input type="search" class="form-control ps-6" placeholder="Search Courses" >
            </form>
        </div>
    </div>
</nav>
