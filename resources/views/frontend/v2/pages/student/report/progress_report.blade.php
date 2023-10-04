@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @php
        $user = auth()->user();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mx-auto">
                        <div class="mx-auto text-center" style="width: 100px;">
                            <img style="width: 100%;height: 100%;" src="{{ asset('/') }}frontend/images/athena_logo.png" alt="">
                        </div>
                        <div class="">
                            <h3>{{ config('app.name' ?? 'Athena Science Academy') }}</h3>
                            <p class="m-0 p-0">{{ $course->title ?? "Course Title" }}</p>
                            <p class="m-0 p-0">Contact Us: +8801714-243042 , +8801614243042 , +8801614759131, athenicschool@gmail.com</p>
                            <p class="m-0 p-0">Address: 73/H, Green Road, Farmgate, Dhaka-1205</p>
                        </div>
                    </div>
                    <h1 class="text-center fw-bold my-2">Progress Report</h1>
                    <div class="text-center">
                        <p class="m-0 p-0">
                            <b>Student Name : </b> {{ $user->name ?? 'Student Name' }}
                            <b>Student Id : </b> {{ $user->unique_id ?? '******'}}
                            <b>Contact No:</b>{{ $user->phone ?? '01* *** ** ***' }}
                        </p>
                        <p class="m-0 p-0">
                            <b>Thana : </b>{{ $user->thana ?? "Thana name" }}
                            <b>District : </b>{{ $user->district ?? "District name" }}
                        </p>
                        <p class="m-0 p-0">
                            <b>School/College Name : </b>{{ $user->institute ?? "School/College Name" }}
                            <b>Student Email : </b>{{ $user->email ?? "example@email.com" }}
                        </p>
                    </div>
                    <div class="mt-2">
                        <h3 class="text-center">Class Status</h3>
                        <div class="">
                            @foreach($course->chapters as $chapter)
                                <div class="mb-2">
                                    <table class="table table-hover table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="4">{{ $chapter->name ?? 'Chapter Name' }}</th>
                                        </tr>
                                        <tr>
                                            <th>SL of Class</th>
                                            <th>Class name</th>
                                            <th>Class Length</th>
                                            <th>Most Viewed</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($chapter->videos as $video)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $chapter->name ??"Chapter name" }}</td>
                                                <td>{{ $video->duration ?? '0 - 0' }}</td>
                                                <td>{{ \App\Models\UserVideo::where('user_id',$user->id)->where('video_id',$video->id)->count() ?? '0' }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-2">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Class View Summary</th>
                                </tr>
                                <tr>
                                    <th>No of Class Attended</th>
                                    <th>Total Classes</th>
                                    <th>Note</th>
                                </tr>
                                <tr>
                                    <td>{{ $studentVideos->count() ?? 0 }}</td>
                                    <td>{{ $course->videos->count() ?? 0 }}</td>
                                    <td>
                                        @php
                                            $hulfVideo = $course->videos->count() / 2;
                                        @endphp
                                        @if($studentVideos->count() < $hulfVideo)
                                            <span class="badge badge-danger">Bad</span>
                                        @elseif($studentVideos->count() > $hulfVideo && $studentVideos->count() < $course->videos->count())
                                            <span class="badge badge-info">Good</span>
                                        @elseif($studentVideos->count() == $course->videos->count())
                                            <span class="badge badge-success">Very Good</span>
                                        @else
                                            <span class="badge badge-warning">---</span>
                                        @endif
                                    </td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h3 class="text-center">Exam Status</h3>
                        <div class="">
                            @foreach($exams as $chapter)
                                @foreach($chapter->exams as $exam)
                                    @php
                                        $mainExam = \App\Models\Exam::with(['examQuestions'])->where('unique_id',$exam->exam_link)->first();
                                        $studentExam = \App\Models\StudentExam::where('user_id',auth()->id())->where('exam_id',$exam->id)->first();
                                    @endphp
                                    <div class="mb-2">
                                        <table class="table table-hover table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">{{ $exam->title ?? 'Exam title' }}</th>
                                            </tr>
                                            <tr>
                                                <th>Exam time</th>
                                                <th>Full Marks</th>
                                                <th>Marks Obtained</th>
                                                <th>Note</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{ $mainExam->minutes ?? "---" }}</td>
                                                <td>{{ $mainExam->examQuestions->count() ?? '---' }}</td>
                                                <td>{{ $studentExam->get_mark ?? 'Not Attended' }}</td>
                                                <td>{{ $studentExam->note ?? "---" }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

