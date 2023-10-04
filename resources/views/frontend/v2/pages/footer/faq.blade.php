@extends('frontend.v2.layout.app')
@section('title',$title)
@section('content')
    <section class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white mb-1 display-4">{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-lg-10 py-7">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8 col-12">
                    <div class="mb-4">
                        <h2 class="mb-0 fw-semibold">Most asked</h2>
                    </div>
                    @forelse($faqs as $key => $faq)
                        <div class="accordion accordion-flush" id="accordionExample">
                            <div class="border p-3 rounded-3 mb-2" id="heading-{{$key}}">
                                <h3 class="mb-0 fs-4">
                                    <a href="#" class="d-flex align-items-center text-inherit text-decoration-none {{ $key == 0 ? 'active' : '' }}"
                                       data-bs-toggle="collapse"
                                       data-bs-target="#collapse-{{$key}}"
                                       aria-expanded="true"
                                       aria-controls="collapse-{{$key}}">
                                        <span class="me-auto">{{ $faq->title ?? '' }}</span>
                                        <span class="collapse-toggle ms-4">
                                            <i class="fe fe-chevron-down text-muted"></i>
                                        </span>
                                    </a>
                                </h3>

                                <div id="collapse-{{$key}}"
                                     class="collapse {{ $key ==0 ? 'show' : '' }}"
                                     aria-labelledby="heading-{{$key}}"
                                     data-bs-parent="#accordionExample">
                                    <div class="pt-2">
                                        <hr/>
                                        {!! $faq->description ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="py-5 mt-3 text-center">No FAQ Found</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection


