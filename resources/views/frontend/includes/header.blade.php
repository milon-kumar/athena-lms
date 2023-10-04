<nav class="navbar navbar-expand-lg bg-dark navbar-dark bg-body-tertiary">
    <div class="container">
        <div class="">
            <a class="navbar-brand" style="display: inline-block;width: 120px;" href="{{ route('frontend.home') }}">
                <img style="width: 100%;height: 100%;" src="{{ asset('frontend/img/logo.png') }}" alt="">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.home') }}">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('frontend.instructor') }}">Instructor</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <div class="input-group">
                    <input type="text" class="form-control rounded-0" placeholder="Search Here">
                    <button class="input-group-text btn btn-success rounded-0">Search</button>
                </div>
            </form>&nbsp;&nbsp;&nbsp;
            @if(auth()->check())
                @if(auth()->user()->type == 'student')
                    <a href="{{route('student.dashboard')}}" style="display: flex;align-items: center;">
                        <div style="width: 50px;height: 50px;border-radius: 50px;border: 1px solid gray;overflow: hidden;display: inline-block;">
                            <img style="width: 100%;height: 100%;" src="{{ asset(auth()->user()->image) ?? defaultImage() }}" alt="{{ auth()->user()->name ?? '' }}">
                        </div>
                        <div class="text-white" style="margin-left: 10px;">
                            <h4 style="margin: 0px;" class="fw-bold">{{ auth()->user()->name }}</h4>
                            <p style="padding: 0;margin: 0;">{{ auth()->user()->email }}</p>
                        </div>
                    </a>
                @endif
            @else
                <a href="{{route('login')}}" class="input-group-text btn btn-success rounded-0">Login</a>
            @endif
        </div>
    </div>
</nav>
