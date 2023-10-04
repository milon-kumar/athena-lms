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
                        <h4>Student Results</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Merit Position</th>
                                    <th>Student Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Given Exam Time</th>
                                    <th>Total Questions</th>
                                    <th>Full Mark</th>
                                    <th>Given Answer</th>
                                    <th>Correct Answer</th>
                                    <th>Wrong Answer</th>
                                    <th>Marks obtained</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentResults as  $result)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $result->student->name ?? ''}}</td>
                                        <td>{{  Illuminate\Support\Carbon::parse($result->exam_start_time) }}</td>
                                        <td>{{  Illuminate\Support\Carbon::parse($result->exam_end_time) }}</td>
                                        <td>{{ $result->diff_time }}</td>
                                        <td>{{ $result->total_question ?? '' }}</td>
                                        <td>{{ $result->total_question ??'' }}</td>
                                        <td>{{ $result->given_ans ?? '' }}</td>
                                        <td>{{ $result->correct_answer ?? '' }}</td>
                                        <td>{{ $result->wrong_answer ?? '' }}</td>
                                        <td>{{ $result->get_mark ?? '' }}</td>
                                        <td>{{ $result->note ?? '' }}</td>
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
