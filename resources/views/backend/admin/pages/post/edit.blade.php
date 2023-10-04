@extends('backend.admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('backend/assets/js/lib/dropify.css')}}">
    <link href="{{asset('/')}}backend/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}backend/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

{{--    <link href="{{asset('/')}}backend/assets/css/vendor/simplemde.min.css" rel="stylesheet" type="text/css" />--}}
<link href="{{asset('/')}}backend/assets/css/vendor/quill.bubble.css" rel="stylesheet" type="text/css" />


@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row bg-dark">
            <div class="col-12 text-center">
                <div class="page-title-box">
                    <h3 class="page-title text-white">Community Post</h3>
                    <a href="{{ route('admin.post.index') }}" class="btn btn-danger btn-sm"><i class="mdi mdi-arrow-left"></i> Go To Newsfeed</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-7 mx-auto">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <form action="{{ route('admin.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Post Title <span class="fw-bolder text-danger">*</span></label>
                                <input name="title" type="text" id="simpleinput" value="{{ $post->title ?? old('title') }}" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Image</label>
                                <input name="image" type="file" id="dropify"  class="form-control dropify">
                                <div class="rounded-circle overflow-hidden" style="width: 45px;height: 45px;">
                                    <img style="width: 100%;height: 100%;object-fit: contain;" src="{{ asset($post->image) }}" alt="{{ $post->slug }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Post Details</label>
                                <textarea class="form-control" name="description" rows="10">{!! $post->description ?? old('description') !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Publish Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend/assets/js/lib/dropify.js') }}"></script>

    <!-- quill js -->
    <script src="{{asset('/')}}backend/assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="{{asset('/') }}backend/assets/js/pages/demo.quilljs.js"></script>

<!-- SimpleMDE js -->
{{--<script src="{{ asset('/') }}backend/assets/js/vendor/simplemde.min.js"></script>--}}
{{--<!-- SimpleMDE demo -->--}}
{{--<script src="{{ asset('/') }}backend/assets/js/pages/demo.simplemde.js"></script>--}}



@endsection
