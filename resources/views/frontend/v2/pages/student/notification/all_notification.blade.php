@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="row">
        <div class="col-md-12">
        <!-- Card -->
        <div class="card">
            <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <!-- Notification -->
                    <h3 class="mb-0">All Notifications</h3>
                    <p class="mb-0">
                        Manage Your All Notification Here...
                    </p>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
                @foreach($notifications as $notification)
                <div class="border-bottom mb-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <div>
                                <h5 class="mb-0">Message From Admin</h5>
                                <p class="mb-0 text-body">{!!  $notification->data['message'] !!}</p>
                            </div>
                            <div>
                                <a href="{{$notification->read_at ? '' : route('student.notification.read',$notification->id) }}">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" style="cursor: pointer" class="form-check-input" {{ $notification->read_at ? 'checked' : '' }} id="switchTen">
                                        <label class="form-check-label" style="cursor: pointer" for="switchTen"></label>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <span class="fs-6 text-muted">
                     <span>
                         <span class="fe fe-watch text-success me-1"></span>{{ $notification->created_at->format("M d") }}</span>
                         <span class="ms-1">{{ $notification->created_at->format("H:i A") }}</span>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
