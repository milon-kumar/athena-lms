<div class="card  mb-4 card-hover h-100">
    <a href="{{ route('frontend.v2.details',$course->slug) }}" class="">
        <img src="{{ asset($course->image) ?? defaultImage() }}" alt="course" class="img-fluid rounded-top-md">
    </a>
    <!-- Card Body -->
    <div class="card-body">
        <h4 class="mb-2 text-truncate-line-2 ">
            <a href="{{ route('frontend.v2.details',$course->slug) }}" class="text-inherit">{{ $course->title ?? 'Course Title' }}</a>
        </h4>
        <!-- List -->
        <ul class="mb-3 list-inline">
            <li class="list-inline-item"><i
                    class="mdi mdi-clock-time-four-outline text-muted me-1"></i>{{ $course?->courseDetails?->total_class_hours ?? '' }} Hours </li>
            <li class="list-inline-item text-success">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="" style="width: 16px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                </svg> Running
            </li>
        </ul>
        <!-- Price -->
        <div class="lh-1 mt-3">
            <span class="text-dark fw-bold">BDT {{ $course->full_course_fee ?? '' }}</span>
            <del class="fs-6 text-muted">BDT {{ $course->regular_course_fee ?? '' }}</del>
        </div>
    </div>
    <!-- Card Footer -->
    <div class="card-footer">
        <div class="row align-items-center g-0">
            <div class="col ms-2">
                <a href="{{ route('frontend.v2.details',$course->slug) }}" class="btn btn-primary d-block">See Details</a>
            </div>
{{--            <div class="col-auto">--}}
{{--                <a href="#" class="text-muted bookmark">--}}
{{--                    <i class="fe fe-bookmark"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
