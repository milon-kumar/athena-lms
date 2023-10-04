@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course : {{ $course->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Right Sidebar -->
            <div class="col-7">
{{--                <iframe id="myIframe" style="width: 100%;height: 450px;" src="https://www.youtube.com/embed/{{optional($show_video)->link ?? $chapters[0]->videos[0]->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
                    {!! $show_video->link !!}

                <div class="card border shadow">
                    <div class="card-header bg-dark text-white">
                        <h4 class="">Comments ({{ $show_video->comments->count() }})</h4>
                    </div>
                    <form action="{{ route('admin.video-comment.store') }}" method="post" class="card-body" enctype="multipart/form-data">
                        @csrf
                        <textarea name="message" class="form-control mb-3" required placeholder="Write Your Comment Here" id="" rows="3"></textarea>
                        @include('backend.admin.components.form_element.input',['type'=>'hidden','name'=>'commentable_id','value'=>$show_video->id])
                        <input type="file" name="image" class="form-control mb-3">
                        <button type="submit" class="btn btn-dark float-end">Post Comment</button>
                    </form>
                </div>


                @if($show_video->comments->count() > 0)
                    <h2>comments</h2>
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col">
                                    @include("backend.admin.components.module.comment.display_comment", ['comments' => $show_video->comments])
                                    <form action="{{ route('admin.video-comment.store-replay') }}" method="post" enctype="multipart/form-data" class="mt-2 d-none" id="replayCommentForm">
                                        @csrf
                                        <input type="hidden" id="commentId" name="commentId" value="">
                                        <input type="hidden" name="blogId" value="{{ $show_video->id }}">
                                        <textarea name="message" rows="3" value="" placeholder="Reply Message" class="form-control mb-2"></textarea>
                                        <input type="file" name="image" class="form-control">
                                        <button type="submit" id="replayCommentButton" class="btn btn-sm btn-primary mt-1 btn-sm">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Right Sidebar -->
            <div class="col-5">
                @foreach($chapters as $key => $chapter)
                    <div class="accordion custom-accordion" id="custom-accordion-one{{$loop->iteration}}">
                        <div class="card mb-1 border shadow">
                                <div class="card-header" id="headingFour{{$loop->iteration}}">
                                    <h5 class="m-0">
                                        <a class="custom-accordion-title d-block py-1"
                                           data-bs-toggle="collapse" href="#collapseFour{{$loop->iteration}}"
                                           aria-expanded="true" aria-controls="collapseFour{{$loop->iteration}}">
                                            {{ $chapter->name ?? ''  }} - ( {{$chapter->videos->count() ?? ''}} videos)
                                            <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseFour{{$loop->iteration}}" class="collapse {{ $chapter->id ==$show_video->course_chapter_id ? 'show' : '' }}"
                                     aria-labelledby="headingFour{{$loop->iteration}}"
                                     data-bs-parent="#custom-accordion-one{{$loop->iteration}}">
                                    <div class="card-body">
                                        @foreach($chapter->videos as $video)
                                            <div class="px-1">
                                                <a href="Javascript:void(0)">
                                                    <h5 class="fw-bold {{ $video->id == $show_video->id ? 'text-success' :'text-dark' }} d-inline-block"><i class="mdi mdi-video"></i> {{ $video->title }}</h5>
                                                </a>
                                                <a href="{{ route('admin.video-comment.show',$video->id) }}" class="btn btn-success btn-sm float-end previewVideo"><i class="mdi mdi-eye"></i> Preview</a>
                                            </div>
                                            <hr class="border-dark"/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div> <!-- end Col -->
        </div><!-- End row -->

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
