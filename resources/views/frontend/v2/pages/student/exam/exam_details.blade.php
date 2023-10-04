@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @php
        $totalStudentExams = $studentExams->count() ?? '0';
    @endphp
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="fw-bolder text-capitalize">give the exam Time ?</h4>
                    <h3>{{ $exam->times ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="fw-bolder text-capitalize">Exam time</h4>
                    <h3>{{ $exam->minutes ?? '0' }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @if($exam->times > $totalStudentExams)
                <a href="{{ route('student.show-exam',$exam->unique_id) }}">
                    <div class="card bg-primary text-center h-100">
                        <div class="card-body flex justify-content-center align-items-center">
                            <h4>Start Exam Now</h4>
                        </div>
                    </div>
                </a>
            @else
                <div class="card bg-danger text-white text-center h-100">
                    <div class="card-body flex justify-content-center align-items-center">
                        <h4>End Your Given Exam Time</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Complete Exams - ( {{ $totalStudentExams }} )</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped border border-secondary">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Exam Name</th>
                                <th>Full mark</th>?
                                <th>Marks Obtained</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($studentExams as $studentExam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $studentExam->exam->name ?? 'Exam Name' }}</td>
                                    <td>{{ $studentExam->total_question ?? '' }}</td>
                                    <td>{{ $studentExam->get_mark ?? '' }}</td>
                                    <td>{{ $studentExam->note ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('student.complete-questions',$studentExam->id) }}" class="btn btn-sm btn-primary">Question</a>
                                        <a href="{{ route('student.exam.edit',$studentExam->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <h4 class="text-center">No Exam Found</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
