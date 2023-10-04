@extends('backend.admin.layouts.app')
@section('title','Add PDF')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border border-secondary">
                    <div class="card-body">
                        @include('backend.admin.components.main.pdf_tabs')
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto mt-3">
                <form action="{{ route('admin.pdf.update',$pdf->id) }}" method="post" class="card border border-secondary mt-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Upload pdf Lecture Notes For <span class="fw-bolder text-uppercase">{{ $pdf->type ?? '' }}</span></h4>
                        <p><code class="fw-bolder text-danger"> Accept Only File Type PDF *</code></p>
                    </div>
                    <div class="card-body">
                        <div class="" id="addRowHere">
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <input type="number" name="serial" value="{{ $pdf->serial ?? '' }}" class="form-control" required placeholder="Serial *">
                                    <input type="hidden" value="{{ $pdf->type ?? '' }}" name="type" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" name="title" value="{{ $pdf->title ?? '' }}" class="form-control" placeholder="PDF Title *">
                                </div>
                                <div class="col-lg-4">
                                    <input type="file" name="pdf" accept="application/pdf" class="form-control" placeholder="Upload PDF *">
                                    <span> <a href="">{{ $pdf->pdf ?? '' }}</a> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
