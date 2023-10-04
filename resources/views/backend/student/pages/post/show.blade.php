@extends('backend.student.layouts.app')
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
    <!-- start page title -->
    <div class="row bg-secondary">
        <div class="col-12" style="position: sticky;width: 100%;">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title text-white">{{ $post->title ?? '' }}</h4>
                <a href="{{ route('student.post.index') }}" class="btn btn-primary mb-2">
                    <i class="mdi  dripicons-feed"> </i> News Feed</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-xl-7 mx-auto">
            <div class="card border border-secondary mb-2">
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
                            @if($post->user_id  == $post->user->id )
                                <a href="{{ route('student.post.edit',$post->id) }}">
                                    <i class="mdi mdi-comment-edit-outline"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <img src="{{ $post->image ? asset($post->image) : asset('images/default.jpg') }}" class="card-img-top" alt="{{ $post->slug }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title ?? '' }}</h5>
                    <p class="card-text">{!! $post->description !!}</p>
                </div>
                <div class="card-footer">
                    <div class="mt-1 mb-1">
                        <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted"><i class="uil uil-comments-alt"></i> {{ $post->comments->count() ??  0}} Comments</a>
                        <a href="javascript: void(0);" class="btn btn-sm btn-link border border-secondary text-muted"><i class="uil uil-eye"></i>{{ $post->view_count ?? 0 }} View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card border shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="">Comments ({{ $post->comments->count() }})</h4>
                </div>
                <form action="{{ route('student.post.comment.store') }}" method="post" class="card-body" enctype="multipart/form-data">
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
                                <form action="{{ route('student.post.comment.replay.store') }}" enctype="multipart/form-data" method="post" class="mt-2 d-none" id="replayCommentForm">
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
