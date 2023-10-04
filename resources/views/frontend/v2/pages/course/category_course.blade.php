@extends('frontend.v2.layout.app')
@section('title',"Category Course")
@section('content')
    <section class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white mb-1 display-4">Find Your Course Here</h1>
                        <p class="mb-0 text-white lead">{{ \App\Models\Course::count() }} Course Learning student here</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section class="py-7">
        <div class="container">
            <div class="row mb-6">
                <div class="col-md-12">
                    <!-- Nav -->
                    <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
                        <li class="nav-item ms-0" role="presentation">
                            <a class="nav-link {{ Request::is('/all-course/all' ? 'active' : '') }}" href="{{ route('frontend.v2.all-course','all') }}">All Course</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="nav-item ms-0" role="presentation">
                                <a class="nav-link" href="{{ route('frontend.v2.all-course',$category->slug) }}">{{ $category->name ?? '' }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!-- Tab Content -->
                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-lg-3 col-md-6 col-12 mb-3">
                            @include('frontend.v2.components.course.course_card')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-end">{!! $courses->links() !!}</div>
                </div>
            </div>
        </div>
    </section>
@endsection


