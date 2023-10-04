@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $pdf->title ?? '' }}</h4>
        </div>
        <div class="card-body">
            <embed
                src="{{ asset($pdf->pdf ?? '') }}#toolbar=0&navpanes=0&scrollbar=0"
                style="width: 100%;height: 100vh;"
            />
        </div>
    </div>
@endsection

