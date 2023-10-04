@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @include('frontend.v2.components.student.complain.complain_top_bar')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Create Your Post</h3>
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
                        <button type="submit" class="btn btn-primary float-end">Submit Complain</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

