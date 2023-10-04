@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @include('frontend.v2.components.student.post.newsfeed_top_bar')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center g-0">
                        <div class="col-auto">
                            @if($post?->user?->image)
                                <img src="{{ asset($post?->user?->image) }}" class="rounded-circle avatar-xs" alt="avatar">
                            @else
                                <img src="{{ defaultImage() }}" class="rounded-circle avatar-xs" alt="avatar">
                            @endif
                        </div>
                        <div class="col ms-2">
                            <span>{{ $post?->user?->name ?? '' }}</span>
                        </div>
                        @if($post->user_id  == $post->user->id )
                            <div class="col-auto">
                                <a href="{{ route('student.post.edit',$post->id) }}" class="text-muted post-comment btn btn-primary btn-sm text-white"><i class="mdi mdi-briefcase-edit"></i></a>
                            </div>
                        @endif

                    </div>
                </div>
                @if($post->image)
                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="{{ $post->title ?? '' }}">
                @else
                    <img src="{{ defaultImage() }}" class="card-img-top" alt="{{ $post->title ?? '' }}">
                @endif
                <div class="card-body">
                    <ul class="mb-3 list-inline flex justify-between">
                        <li class="list-inline-item">
                            <i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>
                            {{ $post->created_at->diffForHumans() }}</li>


                        <li class="list-inline-item">
                            <i class="mdi mdi-eye text-muted me-1"></i>
                            {{ $post->view_count }} viewed</li>

                        <li class="list-inline-item">
                            <i class="mdi mdi-comment text-muted me-1"></i>
                            {{ $post->comments->count() ??  0}} comments</li>
                    </ul>
                    <hr/>
                    <h4 class="mb-2 text-truncate-line-2 ">
                        <a href="javascript:void(0)" class="text-inherit">{{ $post->title ?? '' }}</a>
                    </h4>
                    <p>{!! $post->description ?? ''!!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="">Post Your Comment</h4>
                </div>
                <form action="{{ route('student.post.comment.store') }}" method="post" class="card-body" enctype="multipart/form-data">
                    @csrf
                    <textarea name="message" class="form-control mb-3" required placeholder="Write Your Comment Here" id="" rows="3"></textarea>
                    @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'commentable_id','value'=>$post->id])
                    <input type="file" name="image" class="form-control mb-3">
                    <button type="submit" class="btn btn-primary float-end">Post Comment</button>
                </form>
            </div>
            @if($post->comments->count() > 0)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="">Comments ({{ $post->comments->count() }})</h4>
                    </div>
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
                                    <button type="submit" id="replayCommentButton" class="btn btn-primary mt-1 float-end">Send</button>
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
