<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} || @yield('title')</title>
    @include('backend.admin.includes.header_links')
    @yield('frontcss')
</head>
<body class="loading">
@include('sweetalert::alert')
@include('frontend.includes.header')

@yield('content')

<footer class="bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-dark bg-white h-100">
                    <img class="img-fluid" src="{{ asset('frontend/img/aboutus.png') }}" alt="">
                    <div class="card-header bg-primary">
                        <h4 class="fw-bold text-white">About Us</h4>
                    </div>
                    <div class="card-body bg-primary">
                        <ul class="navbar-nav nav">
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Courses</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Refund Policy</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Privacy Policy</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Rules</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Community</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-white h-100">
                    <img class="img-fluid" style="height: 178px;object-fit: contain" src="{{ asset('frontend/img/announcement.png') }}" alt="">
                    <div class="card-header bg-primary">
                        <h4 class="fw-bold text-white">Announcement</h4>
                    </div>
                    <div class="card-body bg-primary">
                        <ul class="navbar-nav nav">
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Disclaimer</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Notice Board</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Join As A Teacher</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Careers</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Drop CV</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-white h-100">
                    <img class="img-fluid" style="height: 178px;object-fit: contain" src="{{ asset('frontend/img/contactus.png') }}" alt="">
                    <div class="card-header bg-primary">
                        <h4 class="fw-bold text-white">Contract With Us</h4>
                    </div>
                    <div class="card-body bg-primary">
                        <ul class="navbar-nav nav">
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Disclaimer</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Notice Board</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Join As A Teacher</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Careers</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);">Drop CV</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-dark bg-white h-100">
                    <img class="img-fluid" style="height: 178px;object-fit: contain" src="{{ asset('frontend/img/visitus.png') }}" alt="">
                    <div class="card-header bg-primary">
                        <h4 class="fw-bold text-white">Get Connected With Us</h4>
                    </div>
                    <div class="card-body bg-primary">
                        <ul class="navbar-nav nav">
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);"> <i class="mdi mdi-facebook"></i> Facebook </a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);"> <i class="mdi mdi-instagram"></i> Instagram </a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);"> <i class="mdi mdi-youtube"></i> Youtube</a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);"> <i class="mdi mdi-linkedin"></i> Linkedin </a></li>
                            <li class="nav-item"><a class="nav-link" href="Javascript:void(0);"> <i class="mdi mdi-phone-alert"></i> Phone</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12" style="display: flex;justify-content: space-between;">
                <div class="text-white fw-bold">
                    <p class="m-0">Copyright &copy; Athena Science Academy. All Right Reserved</p>
                    <p class="m-0">< Develop by me></p>
                </div>
                <div class="" style="width: 100px;overflow: hidden;">
                    <img style="width: 100%;height: 100%;object-fit: contain;" src="{{ asset('frontend/img/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>

@include('backend.admin.includes.script')

@yield('frontjs')
</body>
</html>
