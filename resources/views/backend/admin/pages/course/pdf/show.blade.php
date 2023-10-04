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
                <iframe style="width: 100%;height: 100vh;" src="{{ $pdf->pdf ? asset($pdf->pdf) : asset('/pdfs/default.pdf') }}" title="{{ $pdf->title ?? '' }}" class="img-fluid"></iframe>
            </div>
        </div>
    </div>
@endsection
