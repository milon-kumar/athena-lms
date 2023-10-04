<li class="dropdown d-inline-block stopevent position-static">
    <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary" href="#"
       role="button" id="dropdownNotificationSecond" data-bs-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false" >
        <i class="fe fe-bell"> </i>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
         aria-labelledby="dropdownNotificationSecond">
        <div>
            <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                <span class="h5 mb-0">Notifications</span>
                <a href="#" class="text-muted">
                    <span class="align-middle">
                        <i class="fe fe-bell me-1"></i>
                    </span>
                </a>
            </div>
            @if(auth()->user()->unreadnotifications->count() > 0)
                <ul class="list-group list-group-flush  " style="height: 300px;" data-simplebar>
                    @foreach(auth()->user()->unreadnotifications as $notification)
                        <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <a class="text-body" href="#">
                                    <div class="d-flex">
                                        @if($notification->type == 'App\Notifications\StudentNotification')
                                            <img src="{{ asset('frontend/images/buy/noti-alt.png') }}"
                                                 alt=""
                                                class="avatar-md rounded-circle" >
                                        @endif
                                        <div class="ms-3">
                                            <h5 class="fw-bold mb-1">Message From Admin</h5>
                                            <p class="mb-3 text-body">
                                                {{ Str::limit($notification->data['message'],50) }}
                                            </p>
                                            <span class="fs-6 text-muted">
                                                 <span>
                                                     <span class="fe fe-watch text-success me-1"></span>{{ $notification->created_at->format("M d") }}</span>
                                                     <span class="ms-1">{{ $notification->created_at->format("H:i A") }}</span>
                                                </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @endif
            <div class="border-top px-3 pt-3 pb-0">
                <a href="{{ route('student.notification.all') }}" class="text-link fw-semibold">See all Notifications</a>
            </div>
        </div>
    </div>
</li>
