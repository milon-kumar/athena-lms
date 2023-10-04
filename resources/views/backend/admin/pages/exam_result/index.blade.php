@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        @if($chapters->count() > 0)
                            <h4 class="mb-0">All Chapter And Exams</h4>
                        @else
                            <h4 class="mb-0 text-center p-4">No Exam Found</h4>
                        @endif                    </div>
                    <div class="card-body">
                        <div class="">
                            @foreach($chapters as $key => $chapter)
                                @if($chapter->exams->count() > 0)
                                    @foreach($chapter->exams as $exam)
                                        <div class="px-2 py-3 mb-2 shadow-sm d-flex justify-content-between align-content-center">
                                            <h5>{{ $exam->title }}</h5>
                                            <h5></h5>
                                            <a href="{{ route('admin.exam-result.show', $exam->id) }}" class="btn btn-dark">View Details</a>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
