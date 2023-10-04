@extends('frontend.v2.pages.student.layout.student_layout')
@section('style')
    <style>
        .card-img-top{
            height: 200px;
        }
    </style>
@endsection
@section('student_content')
    @include('frontend.v2.components.student.post.newsfeed_top_bar')
    <div class="row">
        @forelse($posts as $post)
            @include('frontend.v2.components.student.post.post_card')
        @empty
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center">No Post Found</h1>
                </div>
            </div>
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        tippy(".post-comment",{content:"Comments",theme:"light",animation:"scale"});
    </script>
@endsection
