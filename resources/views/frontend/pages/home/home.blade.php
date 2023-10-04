@extends('frontend.layout.app')
@section('title','Home')
@section('frontcss')
    <style>
        .footer{
            background: url("{{ asset('frontend/img/footerbg.png') }}");
        }
    </style>
@endsection
@section('content')
    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach(\App\Models\Slider::orderBy('serial','ASC')->get() as $key=> $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background: url({{ asset($slider->image) ?? defaultImage() }});">
{{--                    <img src="{{ asset('frontend/img/slider5.jpg') }}" alt="" class="d-block img-fluid">--}}
                    <div class="carousel-caption d-none d-md-block">
                        <button class="btn btn-lg btn-success">Read More</button>
                        <button class="btn btn-lg btn-success">Buy Now</button>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    @if($available_course->count() > 0)
    <div class="available_course container my-4">
        <div class="card border border-dark mb-2">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h3>Popular Course</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($available_course as $key => $course)
                        <div class="col-md-4">
                            <div class="card shadow {{ $key % 2 == 0 ? 'bg-success' : 'bg-info' }} text-white">
                                <div class="card-body">
                                    <a href=""> <h5 class="bold text-center text-white">{{ Str::limit($course->title,25) ?? '' }}</h5></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <section>
        <div class="container">
            <div class="card border border-secondary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>আমাদের কথা</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow rounded-0">
                                <div class="card-body">
                                    <iframe style="object-fit: contain;width: 100%;" height="315" src="https://www.youtube.com/embed/{{ get_setting('our_youtube_message') }}?controls=0&amp;start=420" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow rounded-0">
                                <div class="card-body">
{{--                                    <h4 class="text-dark">About Heading</h4>--}}
                                    <div class="" style="height: 315px;text-align: justify;">
                                        <p class="fw-bolder text-dark" style="font-size: 18px;">{!! get_setting('our_home_description') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($categories->count() > 0)
                        @forelse($categories as $category)
                            <div class="card border border-secondary">
                                <div class="card-header">
                                    <h2 class="fw-bold">{{ optional($category)->name }} - ({{ $category->courses->count() > 1 ? $category->courses->count().' courses' : $category->courses->count().' course' }}) </h2>
                                </div>
                                @if($category->courses->count() > 0)
                                    <div class="card-body">
                                        @include('frontend.component.course_slider')
                                    </div>
                                @endif
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="card border border-secondary mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow rounded-0">
                                <div class="card-header">
                                    <h3>Our Course Teacher's</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row" id="teacherSlider">
                                        @foreach($teachers as $teacher)
                                            <div class="col-md-6">
                                                @include('frontend.component.instractor_card')
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gradient p-4">
        <div class="container">
            <div class="card border border-secondary">
                <div class="" style="background: url({{ asset('frontend/img/sslcom.png') }});height: 213px;
                    background-size: 100% 150px contain;
                    background-repeat: no-repeat;
                    width:100%;
                    background-size: 95% 180px;">
                </div>
            </div>
        </div>
    </section>
    @include('frontend.component.footer')
@endsection
@section('frontjs')
    <script>
        $('.slick').slick({
            dots: false,
            infinite: true,
            speed: 300,
            arrows:false,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
    <script>
        $('#teacherSlider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            arrows:false,
            slidesToShow: 2,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
@endsection
