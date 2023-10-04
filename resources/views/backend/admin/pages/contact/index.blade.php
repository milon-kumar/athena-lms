@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline"> {{ $title }} <span class="badge badge-success-lighten"> {{$messages->count()}}</span></h3>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $key => $message)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>
                                       {{ $message->first_name ?? ' ' . " " . $message->last_name ?? ' ' }}
                                    </td>
                                    <td>
                                        {{ $message->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $message->phone ?? '' }}
                                    </td>
                                    <td>
                                        {!! $message->message ?? '' !!}
                                    </td>
                                    <td>
                                        @can('Contact.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $message->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete </a>
                                            <form action="{{ route('admin.contact.destroy',$message->id) }}" method="post" id="delete-form-{{$message->id}}">@csrf @method('DELETE')</form>
                                        @endcan
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
@endsection
