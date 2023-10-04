@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">All Videos</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Download <span class="text-uppercase">{{ $pdf->type }}</span> (pdf) (Click to Download)</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <iframe class="w-100 h-100 overflow-hidden" src="{{ asset($pdf->pdf ?? '') }}" style="width: 100vw;height: 100vh;min-height: 560px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
