<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Codescandy">
    @yield('meta')
    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}frontend/images/athena_logo.png">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/libs/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- Libs CSS -->
    <link href="{{ asset('/') }}frontend/fonts/feather/feather.css" rel="stylesheet">
    <link href="{{ asset('/') }}frontend/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/libs/simplebar/dist/simplebar.min.css" rel="stylesheet">


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/css/theme.min.css">
    <link rel="canonical" href="index.html">
    <link href="{{ asset('/') }}frontend/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <title>{{ config('app.name')  }} || @yield('title','Laravel')</title>
    @yield('style')



    <style>
        .navbar-image{
            width: 100px;
            margin-right: 30px;
        }
        .course-image{
            height: 200px;
        }
        .course-image img{
            height: 100%;
        }
    </style>
    @if( get_setting('website_content_copy'))
        <style>
            body{
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
        </style>
    @endif
    @if(get_setting('page_loader'))
        <style>
            .main-wrapper{
                position: relative;
                height: 100vh;
                overflow-y: hidden;
            }
            .page-loader {
                width: 100%;
                height: 100vh;
                position: absolute;
                background: #272727;
                z-index: 1000;
            }
            .page-loader .txt {
                color: #666;
                text-align: center;
                top: 40%;
                position: relative;
                text-transform: uppercase;
                letter-spacing: 0.3rem;
                font-weight: bold;
                line-height: 1.5;
            }
            /* SPINNER ANIMATION */
            .spinner {
                position: relative;
                top: 35%;
                width: 80px;
                height: 80px;
                margin: 0 auto;
                background-color: #fff;
                border-radius: 100%;
                -webkit-animation: sk-scaleout 1s infinite ease-in-out;
                animation: sk-scaleout 1s infinite ease-in-out;
            }
            @-webkit-keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0);
                }
                100% {
                    -webkit-transform: scale(1);
                    opacity: 0;
                }
            }
            @keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0);
                    transform: scale(0);
                }
                100% {
                    -webkit-transform: scale(1);
                    transform: scale(1);
                    opacity: 0;
                }
            }
        </style>
    @endif
    @if(get_setting('slider_arrow'))

    @endif
</head>

<body>
@include('sweetalert::alert')
<div class="main-wrapper">
    <main>
        @if(get_setting('page_loader'))
            <!-- PAGE LOADER : PLACE RIGHT AFTER BODY TAG -->
            <div class="page-loader">
                <div class="spinner"></div>
            </div>
        @endif
        <!-- Navbar -->
    @include('frontend.v2.includes.navbar')
    <!-- Page Content -->
        @yield('content')
    </main>

    @include('frontend.v2.includes.footer')

</div>

<!-- Scripts -->

<!-- Libs JS -->
<script src="{{ asset('/') }}frontend/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('/') }}frontend/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}frontend/libs/simplebar/dist/simplebar.min.js"></script>


<!-- Theme JS -->
<script src="{{ asset('/') }}frontend/js/theme.min.js"></script>
<script src="{{ asset('/') }}frontend/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="{{ asset('/') }}frontend/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="{{ asset('/') }}frontend/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="{{ asset('/') }}frontend/js/vendors/tnsSlider.js"></script>
<script src="{{ asset('/') }}frontend/js/vendors/tooltip.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('/') }}frontend/js/vendors/editor.js"></script>
@if(get_setting('website_context_menu'))
    <script>
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    </script>
@endif
@if(get_setting('page_loader'))
    <script>
        $(window).on('load',function(){
            setTimeout(function(){ // allowing 3 secs to fade out loader
                $('.page-loader').fadeOut('slow');
                $(".main-wrapper").css({'overflow-y':"scroll"});
            },1000);
        });
    </script>
@endif

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        isDismissed:true,
        timer: 1000,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
@yield('script')
</body>
</html>
