@extends('frontend.v2.pages.student.layout.student_layout')
@section('style')
    <style>
        iframe{
            width: 100%;
        }
    </style>
@endsection
@section('student_content')
    <div class="row">
        <div class="col-md-6">
{{--            <iframe id="myIframe" style="width: 100%;height: 300px" src="https://www.youtube.com/embed/{{optional($video)->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            {!! $video->link !!}
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="">Post Your Comment</h4>
                </div>
                <form action="{{ route('student.video-comment.store') }}" method="post" class="card-body" enctype="multipart/form-data">
                    @csrf
                    <textarea name="message" class="form-control mb-3" required placeholder="Write Your Comment Here" id="" rows="3"></textarea>
                    @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'commentable_id','value'=>$video->id])
                    <input type="file" name="image" class="form-control mb-3">
                    <button type="submit" class="btn btn-primary float-end">Post Comment</button>
                </form>
            </div>
            @if($video->comments->count() > 0)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="">Comments ({{ $video->comments->count() }})</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col">
                                @include("backend.admin.components.module.comment.display_comment", ['comments' => $video->comments])
                                <form action="{{ route('student.video-comment.store-replay') }}" enctype="multipart/form-data" method="post" class="mt-2 d-none" id="replayCommentForm">
                                    @csrf
                                    <input type="hidden" id="commentId" name="commentId" value="">
                                    <input type="hidden" name="blogId" value="{{ $video->id }}">
                                    <textarea name="message" rows="3" value="" placeholder="Reply Message" class="form-control mb-2"></textarea>
                                    <input type="file" class="form-control" name="image">
                                    <button type="submit" id="replayCommentButton" class="btn btn-primary mt-1 float-end">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <ul class="list-group list-group-flush" style="height: 850px;" data-simplebar >
                <li class="list-group-item">
                    <h4 class="mb-0">All Chapter And Videos</h4>
                    <p class="m-0 text-danger text-bold fw-bold">You Can view a video for maximum {{ $course->courseDetails->video_view_permit ?? '' }} times</p>
                </li>
                @foreach($chapters as $key => $chapter)
                    <li class="list-group-item">
                        <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                           href="#courseThree{{$key}}" role="button" aria-expanded="false" aria-controls="courseThree{{$key}}">
                            <div class="me-auto">
                                {{ $chapter->name ?? '' }} - ({{ $chapter->videos->count() }} videos)
                            </div>
                            <span class="chevron-arrow  ms-4">
                              <i class="fe fe-chevron-down fs-4"></i>
                            </span>
                        </a>
                        <div class="collapse" id="courseThree{{$key}}" data-bs-parent="#courseAccordion{{$key}}">
                            <div class="py-4 nav" id="course-tabTwo" role="tablist" aria-orientation="vertical" style="display: inherit;">
                                @foreach($chapter->videos as $video)
                                    <div  style="margin: 20px 0">
                                        <span> <i class="fe fe-play  fs-6"></i> {{ $video->title ?? '' }}</span>
                                        <a @if($video->userVideoHitCount->count() >= $course->courseDetails->video_view_permit)
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        function replayButton(id){
            $("#commentId").val(id);
            $("#replayCommentForm").removeClass('d-none');
        }
        function maxShowVideo(count) {
            Swal.fire({
                title: 'Sorry!',
                text: `You Video Show Count ${count} Maxmium!`,
                icon: 'warning',
            })
        }
    </script>
@endsection
