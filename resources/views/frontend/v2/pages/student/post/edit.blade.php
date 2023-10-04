@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @include('frontend.v2.components.student.post.newsfeed_top_bar')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Your Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Post Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Upload Post Image">
                            <div class="" style="width: 65px;height: 50px;overflow: hidden;border-radius: 5px;">
                                <img src="{{ asset($post->image) ?? defaultImage() }}" alt="" style="width: 100%;height: 100%;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Post Title</label>
                            <input type="text" name="title" value="{{ $post->title ?? '' }}" class="form-control" placeholder="Write Post title">
                        </div>
                        <div class="mb-3">
                            <label for="">Post Details</label>
                            <textarea class="form-control" rows="6" name="description">{!! $post->description ?? '' !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary float-end">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

