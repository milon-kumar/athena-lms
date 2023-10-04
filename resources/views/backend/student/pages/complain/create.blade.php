@extends('backend.student.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('backend/assets/js/lib/dropify.css')}}">
    <link href="{{asset('/')}}backend/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}backend/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
    <style>
        .label-hand{
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <h2>{{ $title ?? '' }}</h2>
                    <h5>Course : {{ $course->title ?? '' }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-7 mx-auto">
               <div class="card border border-secondary">
                   <div class="card-header bg-dark text-white">
                       <h4>Complain related to (Please select one)</h4>
                   </div>
                   <div class="card-body">
                       <form action="{{ route('student.complain.store') }}" method="post" enctype="multipart/form-data">
                           @csrf

                           <div class="mb-3">
                               <div class="form-check form-radio-info mb-2">
                                   <input type="radio" id="type-1" name="type" value="Lecture Video / Exam Solve Video" class="form-check-input border border-secondary" checked>
                                   <label class="form-check-label label-hand" for="type-1">Lecture Video / Exam Solve Video</label>
                               </div>
                           </div>
                           <div class="mb-3">
                               <div class="form-check form-radio-info mb-2">
                                   <input type="radio" id="type-2" name="type" value="Exam Link" class="form-check-input border border-secondary" >
                                   <label class="form-check-label label-hand" for="type-2">Exam Link</label>
                               </div>
                           </div>
                           <div class="mb-3">
                               <div class="form-check form-radio-info mb-2">
                                   <input type="radio" id="type-3" name="type" value="Publications (Lecture Sheet / Books)" class="form-check-input border border-secondary" >
                                   <label class="form-check-label label-hand" for="type-3">Publications (Lecture Sheet / Books)</label>
                               </div>
                           </div>
                           <div class="mb-3">
                               <div class="form-check form-radio-info mb-2">
                                   <input type="radio" id="type-4" name="type" value="Technical / Payment Issue" class="form-check-input border border-secondary" >
                                   <label class="form-check-label label-hand" for="type-4">Technical / Payment Issue</label>
                               </div>
                           </div>
                           <div class="mb-3">
                               <div class="form-check form-radio-info mb-2">
                                   <input type="radio" id="type-5" name="type" value="Others" class="form-check-input border border-secondary" >
                                   <label class="form-check-label label-hand" for="type-5">Others</label>
                               </div>
                           </div>

                           <div class="mb-3">
                               <label class="form-label">Complain Details</label>
                               <textarea class="form-control border border-dark @error('description') is-invalid @enderror" name="message" id="" rows="3">{!! old('description') !!}</textarea>
                               @error('message')
                                   <small class="text-danger">
                                       {{ $message }}
                                   </small>
                               @enderror
                           </div>
                           <button type="submit" class="btn btn-dark">Submit</button>
                       </form>
                   </div>
               </div>
            </div>
        </div>
@endsection
@section('script')
    <script src="{{ asset('backend/assets/js/lib/dropify.js') }}"></script>

    <!-- quill js -->
    <script src="{{asset('/')}}backend/assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="{{asset('/') }}backend/assets/js/pages/demo.quilljs.js"></script>
@endsection
