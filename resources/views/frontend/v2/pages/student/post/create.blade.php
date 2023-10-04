@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @include('frontend.v2.components.student.post.newsfeed_top_bar')
    <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h3>Create Your Post</h3>
               </div>
               <div class="card-body">
                   <form action="{{ route('student.post.store') }}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="mb-3">
                           <label for="">Post Image</label>
                           <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Upload Post Image">
                           @error('image')
                            <small class="text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <label for="">Post Title</label>
                           <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Write Post title">
                           @error('title')
                            <small class="text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <label for="">Post Details</label>
                           <textarea class="form-control @error('description') is-invalid @enderror" rows="5" name="description"></textarea>
                           @error('description')
                           <small class="text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <button class="btn btn-primary float-end">Submit Post</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
    </div>
@endsection

