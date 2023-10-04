@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course : {{ $course->title ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}<span class="badge badge-success-lighten">{{$course->users->count()}}</span></h3>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive table-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>STD Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Total Class</th>
                                <th>Attend Class</th>
                                <th>Attend Class Score</th>
                                <th>Class Note</th>
                                <th>Total Exams</th>
                                <th>Attend Exam</th>
                                <th>Attend Exam Score</th>
                                <th>Exam Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course->users as $student)
                                @php
                                    $studentChapters = \App\Models\UserVideo::where('user_id',$student->id)->where('course_id',$course->id)->whereNotNull('course_chapter_id')->get()->groupBy('course_chapter_id')->count();
                                    $studentExams = \App\Models\StudentExam::where('user_id',$student->id)->where('course_id',$course->id)->get()->groupBy('exam_id')->count();
                                    $courseTotalExams = $course->exams->count();
                                    $totalcourseChapterCount = $course->chapters->count();

                                    $classNoteRes = ((100 * $studentChapters)/$totalcourseChapterCount);
                                    if ($classNoteRes < 24 && $classNoteRes >=0 ){
                                        $note = "Poor";
                                    }elseif ($classNoteRes < 49 && $classNoteRes >=25 ){
                                        $note = "Good";
                                    }elseif ($classNoteRes < 74 && $classNoteRes >=50 ){
                                        $note = "Very Good";
                                    }elseif ($classNoteRes < 100 && $classNoteRes >=75 ){
                                        $note = "Excellent";
                                    }

                                $examNoteRes = ((100 * $studentExams)/$courseTotalExams);
                                    if ($examNoteRes < 24 && $examNoteRes >=0 ){
                                        $eNote = "Poor";
                                    }elseif ($examNoteRes < 49 && $examNoteRes >=25 ){
                                        $eNote = "Good";
                                    }elseif ($examNoteRes < 74 && $examNoteRes >=50 ){
                                        $eNote = "Very Good";
                                    }elseif ($examNoteRes < 100 && $examNoteRes >=75 ){
                                        $eNote = "Excellent";
                                    }

                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration ?? "" }}</td>
                                    <td>{{ $student->unique_id ?? "Unique Id" }}</td>
                                    <td>{{ $student->name ?? "Student Name" }}</td>
                                    <td>{{ $student->phone ?? "Phone" }}</td>
                                    <td>{{ $student->email ?? "Email" }}</td>
                                    <td>{{ $totalcourseChapterCount ?? "0" }}</td>
                                    <td>{{ $studentChapters ?? "0" }}</td>
                                    <td>{{$classNoteRes . " %"}}</td>
                                    <td>{{$note}}</td>
                                    <td>{{ $courseTotalExams ?? "0" }}</td>
                                    <td>{{ $studentExams }}</td>
                                    <td>{{ $examNoteRes." %" }}</td>
                                    <td>{{ $eNote }}</td>
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
