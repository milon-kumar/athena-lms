<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{env('APP_NAME')}} | @yield('title','Student Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('backend.student.includes.header_links')

</head>

<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
@include('sweetalert::alert')
    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.student.includes.left_side_bar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('backend.student.includes.header')
            <!-- end Topbar -->

            <!-- Start Content-->
            @yield('content')
            <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('backend.admin.includes.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
{{--@include('backend.admin.includes.right_sidebar')--}}
<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<script src="{{asset('/')}}backend/assets/js/vendor.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/app.min.js"></script>

<!-- third party js -->
<script src="{{asset('/')}}backend/assets/js/vendor/apexcharts.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('/')}}backend/assets/js/pages/demo.dashboard.js"></script>
<!-- end demo js-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('script')
</body>
</html>
