<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="mb-2">Available Course</h3>
            </div>
        </div>

        <div class="position-relative">
            <ul class="controls availableCourseSliderController">
                <li class="prev">
                    <i class="fe fe-chevron-left"></i>
                </li>
                <li class="next">
                    <i class="fe fe-chevron-right"></i>
                </li>
            </ul>
            <div class="availableCourseSlider">
                @foreach($available_course as $course )
                    <div class="item">
                        <a href="{{ route('frontend.v2.details',$course->slug) }}">
                            @include('frontend.v2.components.home.available_course_card',['course'=>$course])
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
