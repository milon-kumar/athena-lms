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
                        <h3 class="header-title d-inline">{{ $title }} <span class="badge badge-success-lighten">{{$course->count()}}</span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Student.Dashboard_Download')
                            <a href="{{ route('admin.student.database-download') }}" style="margin-right: 10px;" class="btn btn-success btn-sm float-end"><i class="mdi mdi-download"></i>Download Database</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th class="text-center">Student Name</th>
                                <th>Father’s Name</th>
                                <th>Mother’s Name</th>
                                <th>Contact No</th>
                                <th>School/College Name</th>
                                <th>Email ID</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Address(Thana)</th>
                                <th>Address (District)</th>
                                <th>NID No:</th>
                                <th>Passport No:</th>
                                <th>No of Enrolled Courses</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($course->users as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name ?? '' }}</td>
                                        <td>{{ $student->father_name ?? '' }}</td>
                                        <td>{{ $student->mother_name ?? '' }}</td>
                                        <td>{{ $student->phone ?? '' }}</td>
                                        <td>{{ $student->institute ?? '' }}</td>
                                        <td>{{ $student->email ?? '' }}</td>
                                        <td>{{ $student->gender ?? '' }}</td>
                                        <td>{{ $student->dob ?? '' }}</td>
                                        <td>{{ $student->thana ?? '' }}</td>
                                        <td>{{ $student->district ?? '' }}</td>
                                        <td>{{ $student->national_id ?? '' }}</td>
                                        <td>{{ $student->passport_number ?? '' }}</td>
                                        <th>0</th>
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
