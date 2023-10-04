@extends('backend.student.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{asset('backend/assets/js/lib/dropify.css')}}">
    <link href="{{asset('/')}}backend/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}backend/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row bg-secondary">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <h4 class="page-title text-white fw-bolder">Community Post</h4>
                    <a href="{{ route('student.post.index') }}" class="btn btn-primary mb-2">
                        <i class="mdi  dripicons-feed"> </i> News Feed</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-7 mx-auto">
               <div class="card border border-secondary">
                   <div class="card-body">
                       <form action="{{ route('student.post.store') }}" method="post" enctype="multipart/form-data">
                           @csrf

                           <div class="mb-3">
                               <label for="simpleinput" class="form-label">Post Title <span class="fw-bolder text-danger">*</span></label>
                               <input name="title" type="text" id="simpleinput" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                               @error('title')
                                   <small class="text-danger">
                                       {{ $message }}
                                   </small>
                               @enderror
                           </div>

                           <div class="mb-3">
                               <label for="simpleinput" class="form-label">Image</label>
                               <input name="image" type="file" id="dropify"  class="form-control dropify @error('image') is-invalid @enderror">
                               @error('image')
                                   <small class="text-danger">
                                       {{ $message }}
                                   </small>
                               @enderror
                           </div>

                           <div class="mb-3">
                               <label class="form-label">Post Details</label>
                               <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" rows="10">{!! old('description') !!}</textarea>
                               @error('description')
                                   <small class="text-danger">
                                       {{ $message }}
                                   </small>
                               @enderror
                           </div>
                           <button type="submit" class="btn btn-primary">Publish Post</button>
                       </form>
                   </div>
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
