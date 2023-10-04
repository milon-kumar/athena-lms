@extends('frontend.v2.layout.app')
@section('title',"404 Not Found")
@section('content')
    <section class="container d-flex flex-column">
        <div class="row">
            <div class="offset-xl-1 col-xl-2 col-lg-12 col-md-12 col-12">
                <div class="mt-4">
                    <a href="../index.html"><img src="../assets/images/brand/logo/logo.svg" alt="" class="logo-inverse"></a>
                    <!-- theme switch -->
                    <div class="form-check form-switch theme-switch d-none ">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center g-0 py-lg-22 py-10">
            <!-- Docs -->
            <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-12 col-12 text-center text-lg-start">
                <h1 class="display-1 mb-3">404</h1>

                <p class="mb-5 lead px-4 px-md-0">Oops! Sorry, we couldn’t find the page you were looking for. If you
                    think this is a
                    problem with us, please <a href="{{ route('frontend.v2.contact') }}" class="btn-link">Contact us</a></p>
                <a href="/" class="btn btn-primary me-2">Back to Home</a>
            </div>
            <!-- img -->
            <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
                <img src="{{asset('/')}}frontend/images/error/404-error-img.svg" alt="error" class="w-100"/>
            </div>
        </div>
    </section>
@endsection


