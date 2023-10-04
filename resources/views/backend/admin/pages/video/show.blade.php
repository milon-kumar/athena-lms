@extends('backend.admin.layouts.app')
@section('title',$title)
@section('style')
    <style>
        .youtubeVideoPlayer{
            width: 500px;
            min-height: 400px;
        }
        .youtubeVideoPlayer iframe{
            width: 700px;
            height: 400px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h4>Course : {{ $course->title  ?? '' }}</h4>
                        <h5>Chapter : {{ $chapter->name ?? '' }}</h5>
                        <h6>Video : {{ $video->title ?? '' }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ route('admin.video-index',$chapter->id) }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body col-md-9 mx-auto">
                        @if($video->is_free)
                            <div class="mx-auto youtubeVideoPlayer">
                                {!! $video->link !!}
                            </div>
                        @else
                            {!! $video->link !!}
                        @endif
                    </div>
                    <div class="card-body col-md-9 mx-auto">
                       <div class="card border shadow">
                           <div class="card-header bg-dark text-white">
                               <h4 class="">Comments ({{ $video->comments->count() }})</h4>
                           </div>
                           <form action="{{ route('admin.video-comment.store') }}" method="post" class="card-body" enctype="multipart/form-data">
                               @csrf
                               <textarea name="message" class="form-control mb-3" required placeholder="Write Your Comment Here" id="" rows="3"></textarea>
                               @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'commentable_id','value'=>$video->id])
                               <input type="file" name="image" class="form-control mb-3">
                               <button type="submit" class="btn btn-dark float-end">Post Comment</button>
                           </form>
                       </div>

                        <h2>comments</h2>
                        @if($video->comments->count() > 0)
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col">
                                            @include("backend.admin.components.module.comment.display_comment", ['comments' => $video->comments])
                                            <form action="{{ route('admin.video-comment.store-replay') }}" method="post" class="mt-2 d-none" id="replayCommentForm">
                                                @csrf
                                                <input type="hidden" id="commentId" name="commentId" value="">
                                                <input type="hidden" name="blogId" value="{{ $video->id }}">
                                                <textarea name="message" rows="3" value="" placeholder="Reply Message" class="form-control"></textarea>
                                                <button type="submit" id="replayCommentButton" class="btn btn-sm btn-primary mt-1 btn-sm">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        function replayButton(id){
            $("#commentId").val(id);
            $("#replayCommentForm").removeClass('d-none');
        }
    </script>
@endsection
