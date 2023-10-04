@extends('backend.student.layouts.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row bg-dark text-white">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="d-inline-block">{{ $title ?? 'Read Notification' }}</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Notification</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <!-- Left sidebar -->
                <div class="page-aside-left">
                    <div class="email-menu-list mt-3">
                        <a href="{{ route('student.notification.all') }}" class="text-danger fw-bold"><i class="dripicons-inbox me-2"></i>All Notifications<span class="badge badge-danger-lighten float-end ms-2">{{ $notifications->count() }}</span></a>
                        <a href="{{ route('student.notification.unseen') }}" class="text-success"><i class="dripicons-document me-2"></i>Unseen<span class="badge badge-success-lighten float-end ms-2">{{ auth()->user()->notifications->whereNull('read_at')->count() }}</span></a>
                        <a href="{{ route('student.notification.seen') }}" class="text-info"><i class="dripicons-document me-2"></i>Seen<span class="badge badge-info-lighten float-end ms-2">{{ auth()->user()->notifications->whereNotNull('read_at')->count() }}</span></a>
                    </div>
                </div>
                <!-- End Left sidebar -->

                <div class="page-aside-right">
                    <div class="mt-3">
                        <ul class="email-list">
                            @foreach($notifications as $notification)
                                <li class="{{ $notification->read_at ? '' : 'unread' }}">
                                    @if($notification->type == 'App\Notifications\StudentNotification')
                                        <div class="email-sender-info">
                                            <a href="{{ route('student.notification.read',$notification->id) }}" class="email-title">Message From Admin</a>
                                        </div>
                                    @endif
                                    <div class="email-content">
                                        <a href="{{ route('student.notification.read',$notification->id) }}" class="email-subject">{{ $notification->data['message'] }} </a>
                                        <div class="email-date">{{ $notification->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="email-action-icons">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="Javascript:void(0)"><i class="mdi mdi-sticker-check email-action-icons-item"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- end inbox-rightbar-->
            </div>
        </div>
    </div>
@endsection
