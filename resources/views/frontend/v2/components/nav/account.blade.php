<li class="dropdown ms-2 d-inline-block position-static">
    @if(auth()->check())
        @if(auth()->user()->type == 'super_admin' || auth()->user()->type == 'admin')
            <a class="rounded-circle" href="{{ route('admin.dashboard') }}">
                <div class="avatar avatar-md avatar-indicators avatar-online">
                    <img alt="avatar" src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('frontend/images/avatar/avatar-1.jpg') }}"
                         class="rounded-circle" >
                </div>
            </a>
        @elseif(auth()->user()->type == 'student')
            <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
               aria-expanded="false">
                <div class="avatar avatar-md avatar-indicators avatar-online">
                    <img alt="avatar" src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('frontend/images/avatar/avatar-1.jpg') }}"
                         class="rounded-circle" >
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                <div class="dropdown-item">
                    <div class="d-flex">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('frontend/images/avatar/avatar-1.jpg') }}"
                                 class="rounded-circle" >
                        </div>
                        <div class="ms-3 lh-1">
                            <h5 class="mb-1">{{ auth()->user()->name ?? 'Student Name' }}</h5>
                            <p class="mb-0 text-muted">{{ auth()->user()->email ?? 'example@email.com' }}</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <ul class="list-unstyled">
                    <li>
                        <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                            <i class="fe fe-user me-2"></i>Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages/student-subscriptions.html">
                            <i class="fe fe-star me-2"></i>Subscription
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fe fe-settings me-2"></i>Settings
                        </a>
                    </li>
                </ul>
                <div class="dropdown-divider"></div>
                <ul class="list-unstyled">
                    <li>
                        <a class="dropdown-item" href="index.html" onclick="event.preventDefault();document.getElementById('logoutFormStudent').submit();">
                            <form action="{{route('logout')}}" method="post" class="d-none" id="logoutFormStudent">@csrf</form>
                            <i class="fe fe-power me-2"></i>Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    @else
        <a class="rounded-circle" href="{{ route('login') }}">
            <div class="avatar avatar-md avatar-indicators avatar-online">
                <img alt="avatar" src="{{ asset('frontend/images/avatar/login_png.png') }}"
                     class="rounded-circle" >
            </div>
        </a>
    @endif
</li>


