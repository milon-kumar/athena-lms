<footer class="pt-lg-10 pt-5 footer bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- about company -->
                <div class="mb-4">
                    <img src="{{ asset('/') }}frontend/images/athena_logo.png" alt="" style="width:150px;" class="img-fluid">
                    <div class="mt-4">
                        <p>{!! get_setting('footer_about') !!}</p>
                        <!-- social media -->
                        <div class="fs-4 mt-4">
                            <a href="{{ get_setting('fb_url') }}" class="mdi mdi-facebook text-muted me-2" style="font-size: 30px;"></a>
                            <a href="{{ get_setting('youtube_url') }}" class="mdi mdi-youtube text-muted me-2" style="font-size: 30px;"></a>
                            <a href="{{ get_setting('insta_url') }}" class="mdi mdi-instagram text-muted me-2" style="font-size: 30px;"></a>
                            <a href="tel:{{get_setting('footer_phone')}}" class="mdi mdi-phone text-muted me-2" style="font-size: 30px;"></a>
                            <a href="mailto:{{get_setting('footer_email')}}" class="mdi mdi-email text-muted me-2" style="font-size: 30px;"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
                <div class="mb-4">
                    <!-- list -->
                    <h3 class="fw-bold mb-3">About Us</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a href="{{ route('frontend.v2.all-course','all') }}" class="nav-link">Courses</a></li>
                        <li><a href="{{ route('frontend.v2.our-services') }}" class="nav-link">Our Services</a></li>
                        <li><a href="{{ route('frontend.v2.refund-policy') }}" class="nav-link">Refund Policy</a></li>
                        <li><a href="{{ route('frontend.v2.privacy-policy') }}" class="nav-link">Privacy Policy</a></li>
                        <li><a href="{{ route('frontend.v2.rules') }}" class="nav-link">Rules</a></li>
                        <li><a href="{{ route('frontend.v2.community') }}" class="nav-link">Community</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="mb-4">
                    <!-- list -->
                    <h3 class="fw-bold mb-3">Announcement</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a href="{{ route('frontend.v2.disclaimer') }}" class="nav-link">Disclaimer</a></li>
                        <li><a href="{{ route('frontend.v2.notice-board') }}" class="nav-link">Notice Board</a></li>
                        <li><a href="{{ route('frontend.v2.join-as-teacher') }}" class="nav-link">Join as a Teacher</a></li>
                        <li><a href="{{ route('frontend.v2.carrier') }}" class="nav-link">Carrier</a></li>
                        <li><a href="{{ route('frontend.v2.drop-cv') }}" class="nav-link">Drop CV</a></li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <!-- contact info -->
                <div class="mb-4">
                    <h3 class="fw-bold mb-3">Contact With Us</h3>
                    <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                        <li><a href="tel:01714243042" class="nav-link"> (+88) 01715-868561 </a></li>
                        <li><a href="tel:01714243042" class="nav-link"> (+88) 01614-759131 </a></li>
                        <li><a href="tel:01714243042" class="nav-link"> (+88) 01714-243042 </a></li>
                        <li><a href="tel:01714243042" class="nav-link"> (+88) 01614-243042 </a></li>
                        <li><a href="tel:01714243042" class="nav-link"> (+88) 01716-993830 </a></li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row align-items-center g-0 border-top py-2 mt-6">
            <!-- Desc -->
            <div class="col-lg-4 col-md-5 col-12">
                <p class="m-0">Copyright &copy; {{ date('Y') }} Athena Science Academy. All Right Reserved</p>
                <p class="m-0">< Develop by ORASKA Industries (Pvt) LTD ></p>
            </div>

            <!-- Links -->
{{--            <div class="col-12 col-md-7 col-lg-8 d-md-flex justify-content-end">--}}
{{--                <nav class="nav nav-footer">--}}
{{--                    <a class="nav-link ps-0" href="#">Privacy Policy</a>--}}
{{--                    <a class="nav-link px-2 px-md-3" href="#">Cookie Notice  </a>--}}
{{--                    <a class="nav-link" href="#">Terms of Use</a>--}}
{{--                </nav>--}}
{{--            </div>--}}
        </div>
    </div>
</footer>
