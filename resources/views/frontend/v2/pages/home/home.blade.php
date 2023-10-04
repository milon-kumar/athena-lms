@extends('frontend.v2.layout.app')
@section('style')
    <style>
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

        /*.heroSlider{*/
        /*    height: 500px;*/
        /*    width: 1350px;*/
        /*    min-width: 1350px;*/
        /*}*/

        /*.heroSlider img{*/
        /*    height: 100%;*/
        /*    width: 100% !important;*/
        /*}*/
        /*@media only screen and (max-width: 600px) and (min-width: 150px)  {*/
        /*    .heroSlider{*/
        /*        width: 480px !important;*/
        /*        height: 250px !important;*/
        /*    }*/
        /*}*/

    </style>
@endsection
@section('content')
    @include('frontend.v2.components.home.hero',['sliders'=>$sliders])
    @include('frontend.v2.components.home.fetures')
    @include('frontend.v2.components.home.available_course')
    @include('frontend.v2.components.home.about_us')
    @foreach($categories as $key => $category)
        @if($category->publishedCourses->count() > 0)
            <section class="pt-lg-6 pb-lg-3 pt-3 pb-3">
            <div class="container">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="mb-0">{{ $category->name ?? '' }} ( {{$category->publishedCourses->count() }} {{$category->publishedCourses->count()>1 ? "Courses":"Course"}} )</h2>
                    </div>
                </div>

                <div class="position-relative">
                    <ul class="controls courseSliderControls" id="courseSliderControlsId-{{$loop->index}}">
                        <li class="prev">
                            <i class="fe fe-chevron-left"></i>
                        </li>
                        <li class="next">
                            <i class="fe fe-chevron-right"></i>
                        </li>
                    </ul>
                    <div class="courseSlider" id="courseSlider-{{ $loop->index }}">
                        @foreach($category->publishedCourses as $course )
                            <div class="item">
                                @include('frontend.v2.components.course.course_card')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
    @endforeach
    @include('frontend.v2.components.home.instructor')
    @include('frontend.v2.components.home.opinions')
    @include('frontend.v2.components.home.buy_course')
    @include('frontend.v2.components.home.ssl')
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            @foreach($categories as $category)
                $(".courseSlider#courseSlider-{{ $loop->index }}").length && tns(
                    {
                        container: ".courseSlider#courseSlider-{{ $loop->index }}",
                        loop: false,
                        startIndex: 2,
                        slideBy: "page",
                        items: 1,
                        nav: !1,
                        autoplay: 1,
                        speed: 400,
                        autoplayButtonOutput: !1,
                        mouseDrag: 1,
                        lazyload: 1,
                        gutter: 20,
                        swipeAngle: false,
                        controlsContainer: ".courseSliderControls#courseSliderControlsId-{{$loop->index}}",
                        responsive:
                            {
                                768: { items: 2 },
                                990: { items: 3 },
                                1024: { items: 4 }
                            }
                    });
            @endforeach


            $(".availableCourseSlider").length && tns(
                {
                    container: ".availableCourseSlider",
                    loop: true,
                    startIndex: 2,
                    items: 1,
                    nav: !1,
                    autoplay: 1,
                    swipeAngle: !1,
                    speed: 400,
                    autoplayButtonOutput: !1,
                    mouseDrag: true,
                    lazyload: 1,
                    gutter: 20,
                    controlsContainer: ".availableCourseSliderController",
                    responsive:
                        {
                            768: { items: 2 },
                            990: { items: 3 },
                            1024: { items: 4 }
                        }
            });

            $(".instrucorSlider").length && tns(
                {
                    container: ".instrucorSlider",
                    loop: true,
                    startIndex: 2,
                    items: 1,
                    nav: !1,
                    autoplay: 1,
                    swipeAngle: !1,
                    speed: 400,
                    autoplayButtonOutput: !1,
                    mouseDrag: true,
                    lazyload: 1,
                    gutter: 20,
                    controlsContainer: ".instrucorSliderController",
                    responsive:
                        {
                            768: { items: 2 },
                            990: { items: 3 },
                            1024: { items: 4 }
                        }
            });


            $(".opinionsSlider").length && tns(
                {
                    container: ".opinionsSlider",
                    loop: true,
                    startIndex: 2,
                    items: 1,
                    nav: !1,
                    autoplay: 1,
                    swipeAngle: !1,
                    speed: 400,
                    autoplayButtonOutput: !1,
                    mouseDrag: true,
                    lazyload: 1,
                    gutter: 20,
                    controlsContainer: ".opinionsSliderController",
                    responsive:
                        {
                            768: { items: 2 },
                            990: { items: 3 },
                            1024: { items: 4 }
                        }
            });
        })
    </script>
@endsection



