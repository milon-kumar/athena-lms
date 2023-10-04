@extends('backend.student.layouts.app')
@section('style')
    <style>
        tbody{
            border-style: none !important;
        }
    </style>
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="img-fluid" src="{{ $course?->courseDetails?->image ? asset($course->courseDetails->image) : asset('images/default.jpg') }}" alt="">
                            </div>
                            <div class="col-md-4">
                                <h4>{{ $course?->title ?? '' }}</h4>
                                <p class="" style="text-align: justify;word-spacing: -2px;">{!! $course?->courseDetails?->course_description ?? '' !!}</p>
                            </div>
                            <div class="col-md-4">
                                <h4>ক্লাস সংখ্যাঃ  {{ $course?->chapters?->count() ?? 0}}</h4>
                                <h4>ক্লাস ভিভিও সংখ্যাঃ  {{ $course?->videos?->count() ?? 0 }}</h4>
                                <h4>মোট ক্লাস ঘণ্টাঃ  {{ $course?->courseDetails?->total_class_hower ?? 0 }}</h4>
                                <h4>M.C.Q পরীক্ষা সংখ্যাঃ {{ $course?->courseDetails?->mcq_exams ?? 0 }}</h4>
                                <h4>সাপ্তাহিক পরীক্ষা সংখ্যাঃ {{ $course->courseDetails?->weekly_exams ?? 0}}</h4>
                                <h4>পপপার ফাইনাল পরীক্ষা সংখ্যাঃ {{ $course?->courseDetails?->peper_final_exams ?? 0 }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-success"> View All Class Videos ( You Can view a video for maximum <span class="text-danger fw-bolder">{{ get_setting('video_view_count') }}</span> times )</h3>
            </div>
            <div class="col-md-12">
                <div class="accordion custom-accordion" id="custom-accordion-one">
                    @foreach($course->chapters as $key => $chapter)
                        <div class="card mb-0">
                            <div class="card-header" id="heading{{$key}}">
                                <h5 class="m-0">
                                    <a class="custom-accordion-title d-block py-1"
                                       data-bs-toggle="collapse" href="#collapse{{$key}}"
                                       aria-expanded="true" aria-controls="collapse{{$key}}"> <span class="badge badge-secondary-lighten">{{ $chapter->serial }}</span>
                                        {{ $chapter->name ?? '' }}<i class="mdi mdi-chevron-down accordion-arrow"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse{{$key}}" class="collapse {{ $key == 0 ? 'show' : '' }}"
                                 aria-labelledby="heading{{$key}}"
                                 data-bs-parent="#custom-accordion-one">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        @foreach($chapter->videos as $video)
                                            <tr>
                                                <th>{{ $loop->iteration ?? '' }}</th>
                                                <th>{{ $video->video_title ?? '' }}</th>
                                                <th>{{ $video->duration ?? '' }}</th>
                                                <th>
                                                    <a href="{{ $video->view_count >= get_setting('video_view_count') ? 'Javascript:void(0)' : route('student.show-video',$video->slug ?? '') }} " class="btn btn-success btn-sm">Preview Video ( {{ $video->view_count ?? '' }} ) </a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

{{--<table class="table table-striped">--}}
{{--    <tr>--}}
{{--        <th>#SL</th>--}}
{{--        <th>Class Name</th>--}}
{{--        <th>Has Video</th>--}}
{{--        <th>View</th>--}}
{{--    </tr>--}}
{{--    --}}
{{--        <tr>--}}
{{--            <td>{{ $loop->iteration }}</td>--}}
{{--            <td>{{ $chapter->name ?? '' }}</td>--}}
{{--            <td>{{ $chapter->videos->count() }}</td>--}}
{{--            <td><a href="{{ route('student.class-video',$chapter->slug ?? '') }}" class="btn btn-success"><i class=" dripicons-expand"></i></a></td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}
