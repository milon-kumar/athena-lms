@extends('backend.admin.layouts.app')
@section('title','Enrole List')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" value="{{ date('Y-m-d') }}">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title d-inline">Enrole List <span class="badge badge-success-lighten">{{$enrols->count()}}</span></h4>
                        <a href="{{ route('admin.dashboard') }}"   class="btn btn-danger float-end">Go Back</a> &nbsp;&nbsp;
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>User Photo</th>
                                            <th>User Info</th>
                                            <th>Payment Info</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enrols as $key => $enrole)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="fit">
                                                        <img src="{{ $enrole->user->image ? asset($enrole->user->image) : asset('images/user.webp') }}"
                                                             alt="{{ $enrole->user->name ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <p><span class="fw-bold">Name : </span> <a href="{{ route('admin.user.show',$enrole->user->id ?? '') }}">{{$enrole->user->name ?? '' }}</a></p>
                                                        <p><span class="fw-bold">Phone : </span> {{  $enrole->user->phone ?? ''  }}</p>
                                                        <p><span class="fw-bold">Email : </span> {{  $enrole->user->email ?? ''  }}</p>
                                                        <p>
                                                            <span class="fw-bold">Course : </span>
                                                            <a href="{{ route('frontend.v2.details',$enrole->course->slug ?? '') }}" target="_blank">{{  Str::limit($enrole?->course?->title,30) ?? ''  }}</a>
                                                        </p>
                                                        <p><span class="fw-bold">Enrole Status : </span>
                                                            <span class="badge badge-outline-dark text-uppercase">{{ $enrole->status }}</span>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <p><span class="fw-bold">Method : </span><span class="text-uppercase">{{ $enrole->payment->method }}</span></p>
                                                        <p><span class="fw-bold">Payment Id : </span> <a href="">{{  $enrole->payment->unique_id ?? ''  }}</a></p>
                                                        <p><span class="fw-bold">Number : </span>{{  $enrole->payment->number ?? ''  }}</p>
                                                        <p><span class="fw-bold">TrID : </span>{{  $enrole->payment->transition_id ?? ''  }}</p>
                                                        <p><span class="fw-bold">Date : </span>{{  $enrole->payment->date ?? ''  }}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ $enrole->status == 'approve' ? 'javascript:void(0)' : route('admin.enrole-approve',$enrole->id ?? '') }}" desiabled class="btn btn-success approve" data-id="{{ $enrole->id }}">Approve</a>
                                                    <a href="{{ $enrole->status == 'approve' ? 'javascript:void(0)' : route('admin.enrole-decline',$enrole->id ?? '') }}" class="btn btn-danger decline" data-id="{{ $enrole->id }}">Decline</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.approve').on('click',(e)=>{
            console.log($(this).data('id'));
        });
    </script>
@endsection
