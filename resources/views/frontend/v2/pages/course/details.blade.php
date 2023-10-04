@extends('frontend.v2.layout.app')
@section('title',"Course Details")
@section('meta')
    <meta property="og:url" content="{{ $shearOptions['link'] }}">
    <meta property="og:image" content="{{ asset($course->image) ?? defaultImage() }}">
    <meta property="og:title" content="Course Details">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:see_also" content="{{ route('frontend.v2.home') }}">
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        #social-links{
            margin-left: -30px;
        }
        #social-links ul {
            display: flex;
            gap: 10px;
            list-style: none;
        }

        #social-links ul li {
            border-radius: 5px;
            display: block;
        }

        #social-links ul li a {
            padding: 10px 15px;
            display: block;
            font-size: 22px;
        }

        .available-course-image img{
            width: 50px;
            height: 50px;
            border-radius: 50px;
            border: 2px solid var(--primary);
            overflow: hidden;
        }
        .buyIcon{
            width: 60px;
            height: 60px;
            border-radius: 50px;
            box-shadow: 0 0 1px 3px var(--primary);
        }
        .buyIcon img{
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="">
            <img src="{{$course?->courseDetails?->image ? asset($course?->courseDetails?->image) : defaultImage()}}" class="img-fluid" alt="">
        </div>
    </section>
    <section class="pb-10">
        <div class="container">
            <div class="row my-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="p-2 d-flex align-items-center">
                            <h2 class="" style="font-size: 30px;font-weight: bold; color: #16003f;">{{ $course->title ?? "Course Title" }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mb-4 mb-lg-0 order-2 order-md-1">
                    <!-- Card -->
                   {{-- <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="table-tab" data-bs-toggle="pill"
                                           href="#table" role="tab" aria-controls="table"
                                           aria-selected="true">প্রয়োজনীয়তা</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="table-tab" data-bs-toggle="pill"
                                           href="#table" role="tab" aria-controls="table"
                                           aria-selected="true">ফ্রী ক্লাস এবং পরীক্ষা</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="table" role="tabpanel"
                                     aria-labelledby="table-tab">
                                    <!-- Card -->
                                    <div class="accordion" id="courseAccordion">
                                        <div>
                                            <!-- List group -->
                                            <ul class="list-group list-group-flush">
                                                @foreach($course->chapters as $key => $chapter)
                                                    <li class="list-group-item px-0 pt-0">
                                                        <!-- Toggle -->
                                                        <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none"
                                                           data-bs-toggle="collapse" href="#courseTwo{{$key}}"
                                                           aria-expanded="true" aria-controls="courseTwo{{$key}}">
                                                            <div class="me-auto">
                                                                {{ $chapter->serial ?? '' }}
                                                                . {{ $chapter->name  ?? '' }}
                                                                <p class="mb-0 text-muted fs-6 mt-1 fw-normal">{{$chapter->videos->count()}}
                                                                    videos in the chapter</p>
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
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="">
                                        <p class="text-primary mb-6 lead">
                                            {!! $course?->courseDetails?->course_description ?? \App\Helper\Propertis::$courseDescription !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="h3">Genius Course Teachers</h3>
                        </div>
                        @php
                            $teachers = json_decode($course->courseDetails->teachers);
                        @endphp
                        @foreach($teachers as $item)
                            @php
                                $teacher = \App\Models\Teacher::findOrFail($item)
                            @endphp
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-header p-4">
                                        <img src="{{asset($teacher->image) ?? defaultImage()}}" class="card-img-top rounded" alt="{{ $teacher->name ?? '' }}">
                                    </div>
                                    <div class="card-body">
                                        <span class="h4 font-weight-normal text-gray">Christopher Wood</span>
                                        <br/>
                                        <span class="h5 font-weight-normal text-gray">Co-Founder Themesberg</span>
                                        <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk
                                            of the card's content.</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="">
                                                <a href=""><i class="mdi mdi-facebook" style="font-size: 30px;color: #0866FF;"></i></a>
                                                <a href=""><i class="mdi mdi-youtube" style="font-size: 34px;color: #ff0600;"></i></a>
                                            </div>
                                            <div class="">
                                                <a href="" class="btn btn-sm">All Courses</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="border p-3 rounded-3 mb-2" id="heading-1">
                            <h3 class="mb-0 fs-4">
                                <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                                   data-bs-toggle="collapse"
                                   data-bs-target="#collapse-1"
                                   aria-expanded="true"
                                   aria-controls="collapse-1">
                                    <span class="me-auto">কোর্সটি আমি কেন কিনবো?</span>
                                    <span class="collapse-toggle ms-4">
                                        <i class="fe fe-chevron-down text-muted"></i>
                                    </span>
                                </a>
                            </h3>

                            <div id="collapse-1"
                                 class="collapse show"
                                 aria-labelledby="heading-1"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-2">
                                    <hr/>
                                    If you’re learning to program for the first time, or if you’re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be built with JavaScript, and the platforms they’ll run on
                                </div>
                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="heading-1">
                            <h3 class="mb-0 fs-4">
                                <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                                   data-bs-toggle="collapse"
                                   data-bs-target="#collapse-1"
                                   aria-expanded="true"
                                   aria-controls="collapse-1">
                                    <span class="me-auto">ফ্রী ক্লাস</span>
                                    <span class="collapse-toggle ms-4">
                                            <i class="fe fe-chevron-down text-muted"></i>
                                        </span>
                                </a>
                            </h3>

                            <div id="collapse-1"
                                 class="collapse show"
                                 aria-labelledby="heading-1"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-2">
                                    <hr/>
                                    If you’re learning to program for the first time, or if you’re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be built with JavaScript, and the platforms they’ll run on
                                </div>
                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="heading-1">
                            <h3 class="mb-0 fs-4">
                                <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                                   data-bs-toggle="collapse"
                                   data-bs-target="#collapse-1"
                                   aria-expanded="true"
                                   aria-controls="collapse-1">
                                    <span class="me-auto">ফ্রী পরীক্ষা</span>
                                    <span class="collapse-toggle ms-4">
                                            <i class="fe fe-chevron-down text-muted"></i>
                                        </span>
                                </a>
                            </h3>

                            <div id="collapse-1"
                                 class="collapse show"
                                 aria-labelledby="heading-1"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-2">
                                    <hr/>
                                    If you’re learning to program for the first time, or if you’re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be built with JavaScript, and the platforms they’ll run on
                                </div>
                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="heading-1">
                            <h3 class="mb-0 fs-4">
                                <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                                   data-bs-toggle="collapse"
                                   data-bs-target="#collapse-1"
                                   aria-expanded="true"
                                   aria-controls="collapse-1">
                                    <span class="me-auto">রিফান্ড পলিসি</span>
                                    <span class="collapse-toggle ms-4">
                                        <i class="fe fe-chevron-down text-muted"></i>
                                    </span>
                                </a>
                            </h3>

                            <div id="collapse-1"
                                 class="collapse show"
                                 aria-labelledby="heading-1"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-2">
                                    <hr/>
                                    If you’re learning to program for the first time, or if you’re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be built with JavaScript, and the platforms they’ll run on
                                </div>
                            </div>
                        </div>
                        <div class="border p-3 rounded-3 mb-2" id="heading-1">
                            <h3 class="mb-0 fs-4">
                                <a href="#" class="d-flex align-items-center text-inherit text-decoration-none active"
                                   data-bs-toggle="collapse"
                                   data-bs-target="#collapse-1"
                                   aria-expanded="true"
                                   aria-controls="collapse-1">
                                    <span class="me-auto">ডিসক্লেমার</span>
                                    <span class="collapse-toggle ms-4">
                                        <i class="fe fe-chevron-down text-muted"></i>
                                    </span>
                                </a>
                            </h3>

                            <div id="collapse-1"
                                 class="collapse show"
                                 aria-labelledby="heading-1"
                                 data-bs-parent="#accordionExample">
                                <div class="pt-2">
                                    <hr/>
                                    If you’re learning to program for the first time, or if you’re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be built with JavaScript, and the platforms they’ll run on
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 order-1 order-md-2">
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">কোর্সটিতে তোমার জন্য কি কি থাকছে ?</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent text-primary d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-users align-middle me-2 "></i>কোর্সটি করছেনঃ
                                    </div>
                                    <div class="">
                                        {{ \App\Models\Enrole::count() + optional($course?->courseDetails)->total_course_students?? 0  }}
                                        জন
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent text-success d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-play-circle align-middle me-2 "></i>রেকর্ডেড ক্লাস ভিভিও সংখ্যাঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->total_course_videos ?? 0 }} টি
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent text-primary d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-video align-middle me-2 "></i>লাইভ ক্লাস সংখ্যাঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->recorded_class_video ?? 0 }} টি
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent text-warning d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-watch align-middle me-2 "></i>লাইভ ক্লাস এর সময়ঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->live_class_time ?? 0 }}
                                    </div>
                                </li>

                                <li class="list-group-item bg-transparent text-info d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-watch align-middle me-2 "></i>মোট ক্লাস ঘণ্টাঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->total_class_hower ?? 0 }} ঘণ্টা
                                    </div>
                                </li>

                                <li class="list-group-item bg-transparent text-success d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-book align-middle me-2 "></i>M.C.Q পরীক্ষা সংখ্যাঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->mcq_exams ?? 0 }} টি
                                    </div>
                                </li>

                                <li class="list-group-item bg-transparent text-info d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-book-open align-middle me-2 "></i>সাপ্তাহিক পরীক্ষা সংখ্যাঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->weekly_exams ?? 0 }} টি
                                    </div>
                                </li>

                                <li class="list-group-item bg-transparent text-primary d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-book align-middle me-2 "></i>পেপার ফাইনাল পরীক্ষা সংখ্যাঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->peper_final_exams ?? 0 }} টি
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent text-warning d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-stop-circle align-middle me-2 "></i>ক্লাস কি ওয়েবঅ্যাপে সাজানো
                                        থাকবেঃ
                                    </div>
                                    <div class="">
                                        {{ optional($course->courseDetails)->class_recorded == 1 ? 'হ্যাঁ' : 'না' ?? '' }}
                                    </div>
                                </li>
                                <li class="list-group-item bg-transparent text-info d-flex justify-content-between">
                                    <div class="">
                                        <i class="fe fe-video align-middle me-2 "></i>লাইভ ক্লাস কিভাবে হবেঃ
                                    </div>
                                    <div class="">
                                        {{ $course->courseDetails->live_class_method ?? '' }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div
                                class="d-flex justify-content-center position-relative rounded border-white border rounded-3 bg-cover">
                                <iframe class="w-100 h-100 rounded" {!! get_setting('our_youtube_message') !!} allowfullscreen></iframe>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            <div class="mb-3">
                                <h3>Course Free : <del class="text-danger">&#2547; {{ $course->regular_course_fee ?? '' }}</del> &nbsp;&nbsp; 	<span class="text-success">&#2547; {{ $course->full_course_fee ?? '' }}</span></h3>
                            </div>
                            <div class="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Do you have andy coupon ?">
                                    <span class="input-group-text" id="basic-addon2">Apply</span>
                                </div>
                            </div>
                            <div class="d-grid">
                                <a href="{{ route('frontend.enrole',$course->slug) }}" class="btn btn-success btn-block fw-bolder font-weight-bolder" style="font-size: 21px;">কোর্সটিতে এনরোল করো -></a>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Share With <i class="mdi mdi-share"></i></h4>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <div id="social-links">
                                <ul>
                                    <li class="bg-white border border-primary">
                                        <a href="{{ $shearOptions['facebook'] }}"
                                           class="social-button"
                                           id=""
                                           title=""
                                           rel="">
                                            <span class="fab fa-facebook-square"></span>
                                        </a>
                                    </li>
                                    <li class="bg-white border border-primary">
                                        <a href="{{ $shearOptions['twitter'] }}"
                                           class="social-button"
                                           id=""
                                           title=""
                                           rel="">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li class="bg-white border border-primary">
                                        <a href="{{ $shearOptions['linkedin'] }}"
                                           class="social-button "
                                           id=""
                                           title=""
                                           rel="">
                                            <span class="fab fa-linkedin"></span>
                                        </a>
                                    </li>
                                    <li class="bg-white border border-primary">
                                        <a target="_blank"
                                           href="{{ $shearOptions['whatsapp'] }}"
                                           class="social-button "
                                           id=""
                                           title=""
                                           rel="">
                                            <span class="fab fa-whatsapp"></span>
                                        </a>
                                    </li>
                                    <li class="bg-white border border-primary">
                                        <input type="hidden" value="{{ $shearOptions['link'] }}" id="copyLink">
                                        <a href="javascript:void(0);"
                                           class="social-button"
                                           onclick="copyLink()"
                                           id=""
                                           title=""
                                           rel="">
                                            <span class="fas fa-link"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->

            <section>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h3 class="mb-2">How To Buy Our Courses ?</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3 mb-lg-0">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="buyIcon mx-auto">
                                        <img src="{{ asset('/frontend/images/buy/find.png') }}" alt="">
                                    </div>
                                    <div class="mt-3">
                                        <span class="text-uppercase text-dark">step - 1</span>
                                        <p class="fw-bolder mt-2">{!! get_setting('step_one') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 mb-lg-0">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="buyIcon mx-auto">
                                        <img src="{{ asset('/frontend/images/buy/requirement.png') }}" alt="">
                                    </div>
                                    <div class="mt-3">
                                        <span class="text-uppercase text-dark">step - 2</span>
                                        <p class="fw-bolder mt-2">{!! get_setting('step_two') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 mb-lg-0">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="buyIcon mx-auto">
                                        <img src="{{ asset('/frontend/images/buy/profile.png') }}" alt="">
                                    </div>
                                    <div class="mt-3">
                                        <span class="text-uppercase text-dark">step - 3</span>
                                        <p class="fw-bolder mt-2">{!! get_setting('step_three') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 mb-lg-0">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="buyIcon mx-auto">
                                        <img src="{{ asset('/frontend/images/buy/done.png') }}" alt="">
                                    </div>
                                    <div class="mt-3">
                                        <span class="text-uppercase text-dark">step - 4</span>
                                        <p class="fw-bolder mt-2">{!! get_setting('step_fore') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="mt-4">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Related Courses</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($related_courses as $course)
                        <div class="col-lg-3 col-md-6 col-12">
                            @include('frontend.v2.components.course.course_card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function copyLink() {
            const url = document.getElementById('copyLink').value;
            navigator.clipboard.writeText(url);
            Toast.fire({
                icon: 'success',
                title: 'Shear Link Copy successfully'
            })
        }
    </script>
@endsection

