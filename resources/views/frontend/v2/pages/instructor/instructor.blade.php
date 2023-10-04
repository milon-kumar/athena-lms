@extends('frontend.v2.layout.app')
@section('title',"Category Course")
@section('content')
    <section class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white mb-1 display-4">Our Popular Instructors</h1>
                        <p class="mb-0 text-white lead">{{ $teachers->count() }} Instructors teaching you everyday</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-7">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="mb-5">
                        <h2 class="mb-1">Popular Instructors</h2>
                        <p class="mb-0">Popular instructor of our Courses.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-6">
                @foreach($teachers as $teacher)
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <!-- Card -->
                    @include('frontend.v2.components.instructor.teacher_card',['teacher'=>$teacher])
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


