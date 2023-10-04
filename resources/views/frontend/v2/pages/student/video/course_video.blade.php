@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
        <ul class="list-group list-group-flush" style="height: 850px;" data-simplebar >
            <li class="list-group-item">
                <h4 class="mb-0">All Chapter And Videos</h4>
                <p class="m-0 text-danger text-bold fw-bold">You Can view a video for maximum {{ $course->courseDetails->video_view_permit ?? '' }} times</p>
            </li>
            @foreach($chapters as $key => $chapter)
                <li class="list-group-item">
                <!-- Toggle -->
                <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                   href="#courseThree{{$key}}" role="button" aria-expanded="false" aria-controls="courseThree{{$key}}">
                    <div class="me-auto">
                        <!-- Title -->
                        {{ $chapter->name ?? '' }} - ({{ $chapter->videos->count() }} videos)
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
                        @foreach($chapter->videos as $video)
                            <div class="" style="margin: 20px 0">
                                <span> <i class="fe fe-play  fs-6"></i> {{ $video->title ?? '' }}</span>
                                <a
                                    @if($video->userVideoHitCount->count() >= $course->courseDetails->video_view_permit)
                                        onclick="maxShowVideo({{ $course->courseDetails->video_view_permit }})"
                                    @else
                                        href="{{ route('student.show-video',$video->id) }}"
                                    @endif
                                    class="btn btn-primary btn-sm float-end">Preview - ( {{ $video->userVideoHitCount->count() }} )</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>
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
