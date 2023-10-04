@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <ul class="list-group list-group-flush" style="height: 850px;" data-simplebar >
        <li class="list-group-item">
            @if($chapters->count() > 0)
                <h4 class="mb-0">All Chapter And Exams</h4>
            @else
                <h4 class="mb-0 text-center p-4">No Exam Found</h4>
            @endif
        </li>
        @foreach($chapters as $key => $chapter)
            @if($chapter->exams->count() > 0)
                <li class="list-group-item">
                    <!-- Toggle -->
                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                       href="#courseThree{{$key}}" role="button" aria-expanded="false" aria-controls="courseThree{{$key}}">
                        <div class="me-auto">
                            <!-- Title -->
                            {{ $chapter->name ?? '' }} - ({{ $chapter->exams->count() }} Exams)
                        </div>
                        <!-- Chevron -->
                        <span class="chevron-arrow  ms-4">
                            <i class="fe fe-chevron-down fs-4"></i>
                        </span>
                    </a>
                    <!-- Row -->
                    <!-- Collapse -->
                    <div class="collapse" id="courseThree{{$key}}" data-bs-parent="#courseAccordion{{$key}}">
                        <div class="py-4 nav" id="course-tabTwo" role="tablist" aria-orientation="vertical" style="display: inherit;">
                            @foreach($chapter->exams as $exam)
                                <div class="" style="margin: 20px 0">
                                    <span> <i class="fe fe-book-open  fs-6"></i> {{ $exam->title ?? '' }}</span>
{{--                                    <a href="{{ route('student.show-exam',$exam->exam_link) }}"--}}
{{--                                       class="btn btn-primary btn-sm float-end"--}}
{{--                                    >Start Exam</a>--}}

{{--                                    <a href="{{ route('student.exam-result',$exam->exam_link) }}"--}}
{{--                                       class="btn btn-primary btn-sm float-end"--}}
{{--                                    ><i class="mdi mdi-eye"></i>Show</a>--}}

                                    <a href="{{ route('student.exam-details',[$exam->id,$exam->exam_link]) }}"
                                           class="btn btn-primary btn-sm float-end"
                                        ><i class="mdi mdi-eye"> </i> Exam Details</a>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
@endsection
@section('script')
    <script>
        function maxShowVideo(count) {
            Swal.fire({
                title: 'Sorry!',
                text: `You Video Show Count ${count} Maxmium!`,
                icon: 'warning',
            })
        }
    </script>
@endsection
