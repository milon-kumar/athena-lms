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
            <div class="col-xl-7 mx-auto">
                <div class="card border shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="font-bold">Notification</h4>
                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="card-body">
                        <p>{!! $notification->data['message'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
