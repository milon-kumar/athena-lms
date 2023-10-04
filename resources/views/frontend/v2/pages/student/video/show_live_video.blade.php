@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="row">
        <div class="col-md-6">
            <div class="vimeo-container">
                {!! $video->link ?? "" !!}
                <div id="overlay"></div>
            </div>
            {{--<div class="card mt-4">
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
            @endif--}}
        </div>
        <div class="col-md-6">
            @if($videos->count() > 0)
                <div style="height: 500px;" class="border-0 overflow-y-scroll">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">
                                Videos
                            </th>
                            <th scope="col">
                                View Count
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>
                                    <a
                                        @if($video->userHitCount->count() >= $course->courseDetails->video_view_permit)
                                        onclick="maxShowVideo({{ $course->courseDetails->video_view_permit }})"
                                        @else
                                        href="{{ route('student.single-live-video',$video->id) }}"
                                        @endif
                                        class="text-inherit">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="{{ asset('/') }}frontend/images/default_play.png" alt="" class="img-4by3-lg rounded">
                                            </div>
                                            <div class="ms-3">
                                                <h4 class="mb-1 text-primary-hover">
                                                    {{ Str::limit($video->title,40) ?? '' }}
                                                </h4>
                                                <span class="text-muted">Added on {{ $video->created_at->format("d M Y") }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                {{--                                <td>--}}
                                {{--                                    <div class="d-flex align-items-center">--}}
                                {{--                                        <img src="{{ asset($video?->course?->image) ?? defaultImage() }}" alt="" class="rounded-circle avatar-xs me-2">--}}
                                {{--                                        <h5 class="mb-0">{{ \Illuminate\Support\Str::limit($video?->course?->title,25) ?? '' }}</h5>--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                                <td>
                                    <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>{{ $video->userHitCount->count() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="row my-5">
                    <div class="col-md-12">
                        <h1 class="text-center">No Video Found</h1>
                    </div>
                </div>
            @endif
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

        function maxShowVideo(count) {
            Swal.fire({
                title: 'Sorry!',
                text: `You Video Show Count ${count} Maxmium!`,
                icon: 'warning',
            })
        }

    </script>
@endsection
