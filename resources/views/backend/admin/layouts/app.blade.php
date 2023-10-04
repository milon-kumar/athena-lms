<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name')  }} || @yield('title','Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}frontend/images/athena_logo.png">
    @include('backend.admin.includes.header_links')
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="wrapper" style="background-color: gray;">
@include('sweetalert::alert')
{{--    @include('backend.admin.includes.left_side_bar')--}}
    @include('backend.admin.includes.header')
    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
    </div>
    <div class="text-center" style="background-color: black;padding: 15px 20px;">
        <p>Copyright &copy; Athena Science Academy. All Right Reserved</p>
    </div>
</div>
{{--@include('backend.admin.includes.right_sidebar')--}}
@include('backend.admin.includes.script')
</body>
</html>
