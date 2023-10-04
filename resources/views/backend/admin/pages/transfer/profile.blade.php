@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course Name : {{ $course->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ route('admin.transfer.student') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <a href="" onclick="event.preventDefault();window.print();" class="btn btn-success btn-sm float-end"><i class="mdi mdi-printer"></i> Print</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <tr>
                                <th>Name : </th>
                                <th>{{ $user->name ?? '' }}</th>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <td>{{ $user->email ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $user->phone ?? '' }}</td>
                            </tr>
                            @if($user->father_name)
                            <tr>
                                <th>Rather's Name : </th>
                                <td>{{ $user->father_name ?? '' }}</td>
                            </tr>
                            @endif
                            @if($user->mother_name)
                            <tr>
                                <th>Rather's Name : </th>
                                <td>{{ $user->mother_name ?? '' }}</td>
                            </tr>
                            @endif
                            @if($user->institute)
                            <tr>
                                <th>Institute : </th>
                                <td>{{ $user->institute ?? '' }}</td>
                            </tr>
                            @endif
                            @if($user->thana)
                            <tr>
                                <th>Thana : </th>
                                <td>{{ $user->thana ?? '' }}</td>
                            </tr>
                            @endif
                            @if($user->district)
                            <tr>
                                <th>District : </th>
                                <td>{{ $user->district ?? '' }}</td>
                            </tr>
                            @endif
                            @if($user->dob)
                            <tr>
                                <th>Date Of Birth : </th>
                                <td>{{ $user->dob ?? '' }}</td>
                            </tr>
                            @endif
                            @if($user->gender)
                            <tr>
                                <th>Gender : </th>
                                <td>{{ $user->gender ?? '' }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
