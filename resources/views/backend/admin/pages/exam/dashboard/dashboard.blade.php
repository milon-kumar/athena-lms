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
{{--                  @include('backend.admin.components.exam.dashboard_header')--}}
                    <div class="card-header text-white bg-dark">
                        <h4 class="d-inline-block">Question Lists</h4>
                        <a href="{{ route('admin.exam.create-exam') }}" class="btn btn-primary float-end">Create Exam</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Exam Name</th>
                                <th>Published Link</th>
                                <th>Free Status</th>
                                <th>Has Questions</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($exams as $exam)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{route('exam-publishlink',$exam->unique_id)}}">{{ $exam->name ?? '' }}</a>
                                        </td>
                                        <td>
                                            <span class="d-inline-block border border-success text-dark p-2 rounded">{{ $exam->unique_id }}</span>
                                        </td>
                                        <td>
                                            @if($exam->password)
                                                <span class="badge bg-primary">Payed Exam</span>
                                            @else
                                                <span class="badge bg-info">Anyone</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $exam->examQuestions->count() ?? '' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.exam.exam.show',$exam->id) }}" class="btn btn-success">Edit</a>
                                            <a href="" onclick="deleteData({{ $exam->id }})" class="btn btn-danger">Delete</a>
                                            <form action="{{ route('admin.exam.exam.destroy',$exam->id) }}" class="d-none" method="post" id="delete-form-{{$exam->id}}">@csrf @method('DELETE')</form>
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
