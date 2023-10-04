@extends('frontend.v2.layout.app')
@section('title',"Category Course")
@section('style')
    <style>
        .videoPlayer{
            width: 100%;
            height: 75%;
        }
        .videoPlayer iframe{
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
<section class="p-lg-5 py-7">
    <div class="row">
        <div class="col-xl-8 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
            <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0" style="height: 500px;">
{{--                <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100"--}}
{{--                        src="https://www.youtube.com/embed/{{$video->link}}"></iframe>--}}
                <div class="videoPlayer">
                    {!! $video->link !!}
                </div>
{{--                <div style="position:relative; width:1px; min-width:100%;padding-bottom:56.25%;"><iframe allow="autoplay" class='spotlightr' allowtransparency="true" style="width:1px; min-width:100%; height: 100%; position:absolute" allowfullscreen="true" src="https://videos.cdn.spotlightr.com/watch/MTQ5NTExMA==?fallback=true" frameborder="0" scrolling="no" name="videoPlayer"> </iframe></div>--}}
            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
            <div class="card" id="courseAccordion">
                <div>
                    <ul class="list-group list-group-flush p-4">
                        @foreach($course->chapters as $key => $chapter)
                            <li class="list-group-item px-0 pt-0">
                                <!-- Toggle -->
                                <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none"
                                   data-bs-toggle="collapse" href="#courseTwo{{$key}}"
                                   aria-expanded="true" aria-controls="courseTwo{{$key}}">
                                    <div class="me-auto">
                                        {{ $chapter->serial ?? '' }}
                                        . {{ $chapter->name  ?? '' }}
                                        <p class="mb-0 text-muted fs-6 mt-1 fw-normal">{{$chapter->videos->count()}} videos in the chapter</p>
                                    </div>
                                @if($chapter->videos->count() > 0)
                                    <!-- Chevron -->
                                        <span class="chevron-arrow ms-4">
                                                                    <i class="fe fe-chevron-down fs-4"></i>
                                                                </span>
                                    @endif
                                </a>
                                <!-- Row -->
                                <!-- Collapse -->
                                @if($chapter->videos->count() > 0)
                                    <div class="collapse {{ $key == 0 ? 'show' : '' }}"
                                         id="courseTwo{{$key}}"
                                         data-bs-parent="#courseAccordion{{$key}}">
                                        <div class="pt-3 pb-2">
                                            @foreach($chapter->videos as $video)
                                                <a href="{{ $video->is_free == 1 ? route('frontend.v2.video',[$video->id,$course->slug]) : '' }}"
                                                   class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                    <div class="text-truncate">
                                                                                    <span
                                                                                        class="icon-shape bg-light icon-sm rounded-circle me-2">
                                                                                        <i class="mdi mdi-{{ $video->is_free == 0 ? 'lock':'play'  }}"></i>
                                                                                    </span>
                                                        <span>{{ $video->title ?? 'Video Title Not Found' }}</span>
                                                    </div>
                                                    <div class="text-truncate">
                                                        <span>{{ $video->duration ?? "m - s" }}</span>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
