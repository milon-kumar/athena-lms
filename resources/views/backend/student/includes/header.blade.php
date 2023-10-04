<div class="navbar-custom bg-dark navbar-dark" style="border-bottom: 4px solid var(--bs-secondary)">
    <ul class="list-unstyled topbar-menu float-end mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                @if(auth()->user()->unreadnotifications->count() > 0)
                    <span class="noti-icon-badge"></span>
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="javascript: void(0);" class="text-dark">
                                <small></small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div style="max-height: 230px;" data-simplebar="">

                    @forelse(auth()->user()->unreadnotifications as $notification)
                        <!-- item-->
                        <a href="{{ route('student.notification.read',$notification->id) }}" class="dropdown-item notify-item {{ $notification->read_at ? '' : 'bg-secondary-lighten' }}">
                            @if($notification->type == 'App\Notifications\StudentNotification')
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-message-arrow-left"></i>
                                </div>
                                <p class="notify-details">
                                    Message From Admin
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </p>
                            @endif
                        </a>
                    @empty
                        <h4 class="text-center">No Notification Found</h4>
                    @endforelse

                </div>

                <!-- All-->
                <a href="{{ route('student.notification.all') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                </a>
            </div>
        </li>



        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('images/user.webp')}}"
                                             alt="user-image" class="rounded-circle">
                                    </span>
                <span>
                                        <span class="account-user-name">{{Auth::user()->name}}</span>
                                        <span class="account-position text-uppercase">{{Auth::user()->type}}</span>
                                    </span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{ route('student.dashboard') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="{{ route('student.setting.account') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span>Settings</span>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logoutFormStudent').submit();" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
                <form action="{{route('logout')}}" method="post" id="logoutFormStudent">@csrf</form>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left text-white">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
