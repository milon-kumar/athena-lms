@extends('backend.admin.layouts.app')
@section('title',$course->title ?? 'Course Details')
@section('content')
    <section>
{{--        <div--}}
{{--            class="text-center mb-2"--}}
{{--            style="padding: 10px 0;background: linear-gradient(rgba(0,15,52,0.95),rgba(69,0,0,0.94)), url({{ asset( $course->image) }});background-size: cover;backdrop-filter: blur(10)"--}}
{{--        >--}}
{{--            <h1 class="text-uppercase fw-bold text-white">Athena Science Academy</h1>--}}
{{--            <h4 class="text-white fw-semibold">{{ $course->title ?? '' }}</h4>--}}
{{--        </div>--}}

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card border border-secondary mb-2">
                        <div class="" style="width: 100%;height: 300px;overflow: hidden;">
                            <img
                                class="card-img-top"
                                style="width: 100%;height: 100%;object-fit: cover;"
                                src="{{ asset($course->courseDetails->image ?? config('filesystems.noimage')) }}"
                                alt="{{ $course->slug ?? ''}}">
                        </div>
                        <div class="card-body">
                            <p class="text-">{!! $course->courseDetails->course_description ?? ' '!!}</p>

                            <table class="table table-striped">
                                <tr>
                                    <th>কোর্সটি করছেনঃ </th>
                                    <td>{{ $course->courseDetails->total_course_students ?? 0 }} জন</td>
                                </tr>
                                <tr>
                                    <th>ক্লাস ভিভিও সংখ্যাঃ </th>
                                    <td>{{ $course->courseDetails->total_course_videos ?? 0 }} টি</td>
                                </tr>
                                <tr>
                                    <th>মোট ক্লাস ঘণ্টাঃ </th>
                                    <td>{{ $course->courseDetails->total_class_hower ?? 0 }} ঘণ্টা</td>
                                </tr>
                                <tr>
                                    <th>M.C.Q পরীক্ষা সংখ্যাঃ </th>
                                    <td>{{ $course->courseDetails->mcq_exams ?? 0 }} টি</td>
                                </tr>
                                <tr>
                                    <th>সাপ্তাহিক পরীক্ষা সংখ্যাঃ </th>
                                    <td>{{ $course->courseDetails->weekly_exams ?? 0 }} টি</td>
                                </tr>
                                <tr>
                                    <th>পপপার ফাইনাল পরীক্ষা সংখ্যাঃ </th>
                                    <td>{{ $course->courseDetails->peper_final_exams ?? 0 }} টি</td>
                                </tr>
                                <tr>
                                    <th>ক্লাস কি ওয়েবঅ্যাপে সাজানো থাকবেঃ </th>
                                    <td> {{ $course->courseDetails?->class_recorded == 1 ? 'হ্যাঁ' : 'না' }}</td>
                                </tr>
                                <tr>
                                    <th>ফেসবুক লাইভ ক্লাস কি হবেঃ </th>
                                    <td>{{ $course->courseDetails?->class_facebook_live == 1 ? 'হ্যাঁ' : 'না' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card border border-secondary mb-2">
                        <div class="card-body">
                            <h3>সচরাচর জিজ্ঞাসাঃ </h3>
                            <h5>কোর্স টি কিভাবে কিনবো?</h5>
                            <p>কোর্স টি কেনার পূর্বে ভিডিও টি দেখে নাও</p>
                            <a target="_blank" href="{{ $course->courseDetails?->course_buy_video ?? 'javascript:void(0)'}}">{{ $course->courseDetails?->course_buy_video ?? ''}}</a>
                        </div>
                    </div>
                    <div class="card border border-secondary mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="user-image">
                                        <img
                                            src="{{ asset($course->courseDetails->teacher->image ?? config('filesystems.noimage')) }}"
                                            alt="{{ $course->courseDetails->teacher->name ?? 'No Image' }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5> Course Teacher</h5>
                                    <table>
                                        <tr>
                                            <th class="font-22 fw-semibold">{{ $course->courseDetails->teacher->name ?? '' }}</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $course->courseDetails->teacher->description ?? ''  }}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="d-flex align-items-center" style="margin-top: 25px;">
                                                    <a
                                                        class="d-flex justify-content-center align-items-center"
                                                        style="width: 40px;height: 40px;border-radius: 50px;background: radial-gradient(#0165E1,#17A9FD);margin-right: 20px;color: white;"
                                                        href="{{ $course->courseDetails->teacher->fb_page ?? ''}}"
                                                        target="_blank"
                                                    >
                                                        <i class="mdi mdi-facebook mdi-24px"></i>
                                                    </a>
                                                    <a
                                                        class="d-flex justify-content-center align-items-center"
                                                        style="width: 40px;height: 40px;border-radius: 50px;background: radial-gradient(#FF0000,#ff0000);color: white;"
                                                        href="{{ $course->courseDetails->teacher->youtube_chanel ?? ''}}"
                                                        target="_blank"
                                                    >
                                                        <i class="mdi mdi-youtube mdi-24px"></i>
                                                    </a>
                                                </div>

                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border border-secondary mb-2">
                        <div class="card-img-top">
                            <div class="instraction-video">
                                {!! $course->courseDetails->course_introduction_video ?? '' !!}
                            </div>
                        </div>
                        <div class="card-body">
                            <h4>Full Course Fee : <del style="font-size: 18px;" class="text-danger fw-bolder">BDT{{$course->regular_course_fee}}</del> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4>&nbsp;
                            <span style="font-size: 18px;" class="fw-bolder text-primary">BDT {{ $course->full_course_fee }}</span>
                            <h4>Category : {{ $course->category->name ?? '' }} </h4>
                            <h4>Enrollment Validity : {{ $course->courseDetails->enrollment_validity ?? '' }} Months</h4>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('frontend.enrole',$course->slug ?? '') }}" class="btn btn-success">কোর্সটিতে ভর্তি হও</a>
                            <input type="hidden" value="{{ url('/details/'.$course->slug) }}" id="copyLink">
                            <a href="javascript:void(0);" onclick="copyLink()" class="btn btn-success">
                                <i class="mdi mdi-share"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="border border-secondary">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <h4>All Classes </h4>
                        </div>
                        <div class="card-body">
                            <div class="accordion custom-accordion" id="custom-accordion-one">
                                @foreach($course->chapters as $key => $chapter)
                                    <div class="card mb-0">
                                        <div class="card-header" id="heading-{{$key}}">
                                            <h5 class="m-0">
                                                <a class="custom-accordion-title d-inline-block py-1"
                                                   data-bs-toggle="collapse" href="#collapse-{{$key}}"
                                                   aria-expanded="true" aria-controls="collapse-{{$key}}"
                                                   disabled
                                                >
                                                    @if($chapter->is_free == 1)
                                                        <i class="mdi mdi-lock">&nbsp;</i>
                                                    @else
                                                        <i class=""></i>
                                                    @endif
                                                    {{$chapter->serial ?? ''}} . {{ $chapter->name ?? ''}}<i class="mdi mdi-chevron-down accordion-arrow"></i>
                                                </a>
                                                <a href="Javascript:void(0);" class="btn btn-sm btn-danger float-end" onclick="event.preventDefault();document.getElementById('deleteForm{{$chapter->id}}').submit();"><i class="dripicons-trash">&nbsp;</i> Delete</a>
                                                <a href="{{ route('admin.chapters.edit',$chapter->id) }}" class="btn btn-sm btn-success float-end"><i class="dripicons-document-edit">&nbsp;</i> Edit</a>
                                                <form action="{{ route('admin.chapters.destroy',$chapter->id ?? '') }}" id="deleteFrom{{ $chapter->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </h5>
                                        </div>
                                        <div id="collapse-{{$key}}" class="collapse"
                                             aria-labelledby="heading-{{$key}}"
                                             data-bs-parent="#custom-accordion-one">
                                            <div class="card-body">
                                                <ul class="navbar-nav">
                                                    @foreach($chapter->videos as $video)
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="">
                                                                <i class="mdi mdi-play-circle"></i> {{ $loop->iteration }} . {{ $video->video_title ?? '' }}
                                                            </a>
                                                            <a href="" class="btn btn-success btn-sm" >Delete</a>
                                                            <a href="" class="btn btn-success btn-sm">Edit</a>
                                                            <form action=""  method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-12 col-md-12">--}}
{{--                    <div class="card border border-secondary">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>Free Sample Classes</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="accordion custom-accordion" id="custom-accordion-one">--}}
{{--                                NO Question Found--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection
