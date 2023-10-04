@extends('backend.admin.layouts.app')
@section('title',$title)
@section('style')
    <style>
        .profile-image{
            width: 45px;
            height: 45px;
            overflow: hidden;
            border: 4px solid #727cf5 !important;
        }
        .profile-info{
            padding: 0 20px;
        }
        .profile-info h5{
            margin: 0px;
            padding: 8px 0px 0 0;
        }
    </style>
@endsection
@section('content')
    <div class="row bg-dark">
        <div class="col-12 text-center">
            <div class="page-title-box">
                <h3 class="page-title text-white">Community Post</h3>
                <a href="{{ route('admin.post.index') }}" class="btn btn-danger btn-sm"><i class="mdi mdi-arrow-left"></i> Go To Newsfeed</a>
            </div>
        </div>
    </div>
    <div class="row mt-2">
            <div class="col-md-6 mb-3 mx-auto">
                <div class="card h-100 border shadow">
                    <div class="card-header">
                        <div class="">
                            <div class="rounded-circle profile-image" style="float: left;">
                                <img class="w-100 h-100 contain" src="{{ $post->user->image ? asset($post->user->image) : asset('images/user.webp')}}" alt="{{ $post->user->name ?? ''}}">
                            </div>
                            <div class="profile-info" style="float: left;">
                                <h5>{{ $post->user->name ?? '' }}</h5>
                                <p>Created At : {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="float-end" style="float: left;">
                                @if(auth()->id()  == $post->user->id )
                                    <a href="{{ route('admin.post.edit',$post->id) }}">
                                        <button class="btn btn-success btn-sm">Edit &nbsp;<i class="mdi mdi-comment-edit-outline"></i></button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <a href="{{  asset($post->image) }}">
                        <div class="" style="width: 100%;height: 355px;">
                            <img class="img-fluid card-img-top" style="width: 100%;height: 100%;" src="{{ asset($post->image) ?? defaultImage()  }}" alt="{{ $post->title ?? '' }}">
                        </div>
                    </a>
                    <div class="card-body">
                        <div class="">
                            <a href="{{ route('admin.post.show',$post->id) }}"><h4 class="text-dark">{{ $post->title ?? '' }}</h4></a>
                            <p>{!!$post->description !!}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="Javascript:void(0);" class="btn btn-sm btn-outline-success"> <i class="mdi mdi-eye"> </i>  Total View - {{ $post->view_count }}</a>
                        <a href="Javascript:void(0);" class="btn btn-sm btn-outline-success"> <i class="mdi mdi-comment"> </i>  Total Comment - {{ $post->comments->count() }}</a>
                    </div>
                </div>
            </div>
</div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card border shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="">Comments ({{ $post->comments->count() }})</h4>
                </div>
                <form action="{{ route('admin.post.comment.store') }}" method="post" class="card-body" enctype="multipart/form-data">
                    @csrf
                    <textarea name="message" class="form-control mb-3" required placeholder="Write Your Comment Here" id="" rows="3"></textarea>
                    @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'commentable_id','value'=>$post->id])
                    <input type="file" name="image" class="form-control mb-3">
                    <button type="submit" class="btn btn-dark float-end">Post Comment</button>
                </form>
            </div>


            @if($post->comments->count() > 0)
                <h2>comments</h2>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col">
                                @include("backend.admin.components.module.comment.display_comment", ['comments' => $post->comments])
                                <form action="{{ route('admin.post.comment.replay.store') }}" enctype="multipart/form-data" method="post" class="mt-2 d-none" id="replayCommentForm">
                                    @csrf
                                    <input type="hidden" id="commentId" name="commentId" value="">
                                    <input type="hidden" name="blogId" value="{{ $post->id }}">
                                    <textarea name="message" rows="3" value="" placeholder="Reply Message" class="form-control mb-2"></textarea>
                                    <input type="file" class="form-control" name="image">
                                    <button type="submit" id="replayCommentButton" class="btn btn-sm btn-primary mt-1 btn-sm">Send</button>
                                </form>
                            </div>
                        </div>
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
    </script>
@endsection
