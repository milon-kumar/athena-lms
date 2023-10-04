<div class="leftside-menu">
    <!-- LOGO -->
    <a href="{{route('admin.dashboard')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('/') }}frontend/images/athena_logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}frontend/images/athena_logo.png" alt="" height="16">
        </span>
    </a>
    <!-- LOGO -->
    <a href="{{route('admin.dashboard')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('/') }}frontend/images/athena_logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}frontend/images/athena_logo.png" alt="" height="16">
        </span>
    </a>
    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item menuitem-active">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="mdi mdi-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
