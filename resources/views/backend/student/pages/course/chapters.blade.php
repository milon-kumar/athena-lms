@extends('backend.student.layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card border bg-dark text-white text-center">
                <div class="card-body">
                    <h2>{{ $title ?? '' }}</h2>
                    <h4>Course : {{$course->title ?? ''}}</h4>
                    <h5 class="d-inline-block">Total Chapter : {{ $course->chapters->count() ?? '' }}</h5> &nbsp; &nbsp; &nbsp;
                    <h5 class="d-inline-block">Total Videos : {{ $course->videos->count() ?? '' }}</h5>
                    <h4> You Can view a video for maximum <span class="text-danger fw-bolder">{{ $course->courseDetails->video_view_permit ?? '' }}</span> times</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border">
                <div class="card-header bg-dark text-white">
                    <h4>Chapters</h4>
                </div>
                <div class="card-body">
                    @foreach($course->chapters as $key => $chapter)
                        <div class="accordion custom-accordion" id="custom-accordion-one{{$loop->iteration}}">
                            <div class="card mb-1 border shadow">
                                <div class="card-header" id="headingFour{{$loop->iteration}}">
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title d-block py-1"
                                           data-bs-toggle="collapse" href="#collapseFour{{$loop->iteration}}"
                                           aria-expanded="true" aria-controls="collapseFour{{$loop->iteration}}">
                                            {{ $chapter->name ?? ''  }} - ( {{$chapter->videos->count() ?? ''}} videos)
                                            <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFour{{$loop->iteration}}" class="collapse"
                                     aria-labelledby="headingFour{{$loop->iteration}}"
                                     data-bs-parent="#custom-accordion-one{{$loop->iteration}}">
                                    <div class="card-body">
                                        @foreach($chapter->videos as $video)
                                            <div class="px-1">
                                                <a href="Javascript:void(0)">
                                                    <h5 class="fw-bold text-dark d-inline-block"><i class="mdi mdi-video"></i> {{ $video->title }}</h5>
                                                </a>
                                                <a
                                                    @if($course->courseDetails->video_view_permit <= $video->view_count)
                                                        onclick="showVideoCountWarning({{ $course->courseDetails->video_view_permit }})"
                                                    @else
                                                        href="{{ route('student.show-video',$video->id) }}"
                                                    @endif
                                                   class="btn btn-success btn-sm float-end previewVideo">
                                                    <i class="mdi mdi-eye"></i> - {{ $video->view_count ?? '' }} Preview</a>
                                            </div>
                                            <hr class="border-dark"/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function showVideoCountWarning(count) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: `You Can view a video for maximum ${count} times`,
            })
        }
    </script>
@endsection
