@extends('backend.student.layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white border shadow text-center">
                <div class="card-body">
                    <h1>{{ $title }}</h1>
                    <h5>Course : {{ $course->title }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Right Sidebar -->
        <div class="col-5">
            <iframe id="myIframe" style="width: 100%;height: 450px;" src="https://www.youtube.com/embed/{{optional($show_video)->link ?? $chapters[0]->videos[0]->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <!-- Right Sidebar -->
        <div class="col-7">
            @foreach($chapters as $key => $chapter)
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

                        <div id="collapseFour{{$loop->iteration}}" class="collapse {{ $chapter->id ==$show_video->course_chapter_id ? 'show' : '' }}"
                             aria-labelledby="headingFour{{$loop->iteration}}"
                             data-bs-parent="#custom-accordion-one{{$loop->iteration}}">
                            <div class="card-body">
                                @foreach($chapter->videos as $video)
                                    <div class="px-1">
                                        <a href="Javascript:void(0)">
                                            <h5 class="fw-bold {{ $video->id == $show_video->id ? 'text-success' :'text-dark' }} d-inline-block"><i class="mdi mdi-video"></i> {{ $video->title }}</h5>
                                        </a>
                                        <a
                                            @if($course->courseDetails->video_view_permit <= $video->view_count)
                                                onclick="showVideoCountWarning({{ $course->courseDetails->video_view_permit }})"
                                            @else
                                                href="{{ route('student.show-video',$video->id) }}"
                                            @endif
                                           class="btn btn-success btn-sm float-end previewVideo"><i class="mdi mdi-eye"></i> - {{ $video->view_count ?? 0 }} Preview</a>
                                    </div>
                                    <hr class="border-dark"/>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- end Col -->
    </div><!-- End row -->
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

        function replayButton(id){
            $("#commentId").val(id);
            $("#replayCommentForm").removeClass('d-none');
        }
    </script>
@endsection
