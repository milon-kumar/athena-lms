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
    <!-- Content -->
    <section class="py-7">
        <div class="container">
            <div class="row mb-6">
                <div class="col-md-12">
                    <p>{!! get_setting('disclaimer') !!}</p>
                </div>
            </div>
        </div>
    </section>
@endsection


