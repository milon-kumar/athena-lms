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
                    <h4 class="page-title">Download <span class="text-uppercase">{{ $type }}</span> (pdf) (Click to Download)</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
{{--                        <h4 class="header-title mb-3">{{ $pdfs->count() > 1 ?$pdfs->count()->count()."- PDF'S" : $pdfs->count().'- PDF'}}</h4>--}}
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="navbar-nav">
                                    @forelse($pdfs as $pdf)
                                        <li class="nav-item border mb-2 p-2">
                                            <a class="nav-link d-inline-block" href="">
                                                <i class="mdi mdi-play-circle"></i> {{ $loop->iteration }} . {{ $pdf->title ?? '' }}</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <i><code>{{Str::limit( asset($pdf->pdf ?? '') ,45)}}</code></i>
                                            <a href="{{ route('student.pdf.show',$pdf->id) }}" class="btn btn-success btn-sm float-end d-inline-block"><i class="mdi mdi-eye"></i>&nbsp;Preview</a>
                                            <a href="{{ $pdf->pdf ? asset($pdf->pdf) : '' }}" download class="btn btn-success btn-sm float-end d-inline-block" style="margin-right: 5px;"><i class="mdi mdi-download"></i>&nbsp;Download</a>
                                        </li>
                                    @empty
                                            <h3 class="text-center">PDF Not Found</h3>
                                    @endforelse
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
