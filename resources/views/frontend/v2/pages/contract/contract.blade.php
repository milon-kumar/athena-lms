@extends('frontend.v2.layout.app')
@section('title',$title)
@section('content')
    <section class="container-fluid">
        <div class="row align-items-center min-vh-100">
            <!-- col -->
            <div class="col-lg-6 col-md-12 col-12">
                <div class="px-xl-20 py-7 py-lg-0">
                    <div class="">
                        <h1 class="display-4 fw-bold">Get In Touch.</h1>
                        <p class="lead text-dark">
                            Fill in the form to the right to get in touch with someone on
                            our team, and we will reach out shortly.
                        </p>
                        <div class="mt-8 fs-4">
                            <p class="mb-4">
                                If you are seeking support please visit our
                                <a href="{{ route('frontend.v2.our-services') }}">support portal</a> before reaching out directly.
                            </p>

                            <p>
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <a href="tel:{{get_setting('footer_phone')}}"> (+88) {{ get_setting('footer_phone') }}</a>
                            </p>

                            <p>
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <a href="tel:01714243042"> (+88) 01716-993830</a>
                            </p>
                            <p>
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <a href="mailto:{{get_setting('footer_email')}}">{{get_setting('footer_email')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- background color -->
            <div class="col-lg-6 d-lg-flex align-items-center w-lg-50 min-vh-lg-100 position-fixed-lg bg-cover bg-light top-0 right-0">
                <div class="px-4 px-xxl-20 px-xl-14 py-8 py-lg-0">
                    <!-- form section -->
                    <div id="form">
                        <!-- form row -->
                        <form action="{{ route('frontend.v2.contact-message') }}" method="post" class="row">
                            @csrf
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">First Name:<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="first_name" id="fname" placeholder="First Name" required />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="lname">Last Name:
                                <input class="form-control" type="text" name="last_name" id="lname" placeholder="Last Name" />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="email">Email:<span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email" required />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="phone">Phone Number:
                                <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" />
                            </div>
                            <!-- form group -->
                            <div class="mb-3 col-12">
                                <label class="text-dark form-label" for="messages">Message:</label>
                                <textarea class="form-control" id="messages" name="message" rows="3" placeholder="Messages"></textarea>
                            </div>
                            <!-- button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


