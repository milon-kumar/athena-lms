@extends('frontend.v2.layout.app')
@section('content')
    <section class="pt-5 pb-5">
       <div class="px-5">
           <!-- User info -->
           <div class="row align-items-center">
               <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                   <!-- Bg -->
                   <div class="pt-16 rounded-top" style="
                       background: url({{ asset('/') }}frontend/images/background/profile-bg.jpg) no-repeat;
                       background-size: cover;
                       "></div>
                   <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2 ">
                       <div
                           class="d-flex align-items-end justify-content-between  ">
                           <div class="d-flex align-items-center">
                               <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                   <img src="{{auth()->user()->image ? asset(auth()->user()->image) :  asset('frontend/images/avatar/avatar-3.jpg') }}"
                                        class="avatar-xl rounded-circle border border-4 border-white"
                                        style="object-fit: cover;"
                                        alt="avatar">
                               </div>
                               <div class="lh-1">
                                   <h2 class="mb-0">{{ auth()->user()->name ?? '' }}
                                       <a href="#" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top" title="Beginner">
                                           <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                               <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                               <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                           </svg>
                                       </a>
                                   </h2>
                                   <p class=" mb-0 d-block">{{ auth()->user()->email ?? 'example@email.com' }}</p>
                               </div>
                           </div>
                           <div class="float-end">
                               @if(stdCourseId())
                                   @php
                                       $course = \App\Models\Course::findOrFail(stdCourseId())
                                   @endphp
                               @endif
                               @if(!empty($course))
                                   <div class="d-flex align-items-center">
                                       <img src="{{ asset($course->image) ?? defaultImage() }}" alt="" class="rounded-circle avatar-xs me-2">
                                       <h5 class="mb-0">{{ \Illuminate\Support\Str::limit($course->title,25) ?? '' }} <i class="mdi mdi-check-circle text-primary"></i></h5>
                                   </div>
                               @else
                                    <h4 class="text-danger">First Select Your Course !!!</h4>
                               @endif
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Content -->
           <div class="row mt-0 mt-md-4">
               @include('frontend.v2.pages.student.layout.student_sidebar')
               <div class="col-lg-9 col-md-8 col-12">
                   @yield('student_content')
               </div>
           </div>
       </div>
    </section>
@endsection
