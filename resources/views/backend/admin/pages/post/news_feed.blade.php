@extends('backend.admin.layouts.app')
@section('content')
    <div class="row bg-dark">
        <div class="col-12 text-center">
            <div class="page-title-box">
                <h3 class="page-title text-white">Community Post</h3>
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-sm mb-2"><i class="mdi mdi-plus-circle"> </i> Create A Post</a>
            </div>
        </div>
    </div>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card mb-3 card-hover">
                    <a href="{{ route('student.post.show',$post->id) }}" class="card-img-top">
                        @if($post->image)
                            <img src="{{ asset($post->image) }}" alt="course" class="card-img-top rounded-top-md">
                        @else
                            <img src="{{ defaultImage() }}" alt="course" class="card-img-top rounded-top-md">
                        @endif
                    </a>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h4 class="mb-2 text-truncate-line-2 ">
                            <a href="{{ route('student.post.show',$post->id) }}" class="text-inherit">{{ Str::limit($post->title,45) ?? '' }}</a>
                        </h4>
                        <!-- List -->
                        <ul class="mb-3 list-inline">
                            <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>{{ $post->created_at->diffForHumans() }}</li>
                        </ul>
                        <div class="lh-1">
                            <span><i class="mdi mdi-eye text-warning me-n1"></i></span>&nbsp;
                            <span class="text-warning">{{ $post->view_count }}</span>
                            <span class="fs-6 text-warning">viewed</span>
                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div class="card-footer">
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
                            <div class="col-auto">
                                <a href="#" class="text-muted post-comment">
                                    <i class="mdi mdi-comment"></i> - {{ $post->comments->count() ?? '0' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
