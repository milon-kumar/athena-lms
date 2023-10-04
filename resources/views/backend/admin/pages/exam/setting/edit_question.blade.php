@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <a href="{{ route('admin.exam.dashboard','image') }}" class="btn btn-danger btn-sm">Go Back</a>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.exam.question.update',$question->id) }}" class="card" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row" id="addRowHere">
                    <div id="addCOlumn" class="col-md-12">
                        <div class="card shadow border border-secondary">
                            <div class="card-body">
                                <div class="mb-2">
                                    <textarea placeholder="Input Your Question" name="q" class="form-control editor" rows="1">{!! $question->question !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-1">
                                                <label for="option1" class="input-group-text">
                                                    <input id="option1" name="answer" class="form-check-input mt-0" type="radio" value="1" {{ $question->answer == 1 ? 'checked' : '' }} aria-label="Radio button for following text input">
                                                </label>
                                                <input type="text" class="form-control" name="option[option1]" value="{{ $optionItem[0] ?? ''}}" aria-label="Option One">
                                            </div>
                                            <div class="input-group">
                                                <label for="option2"  class="input-group-text">
                                                    <input id="option2" name="answer" class="form-check-input mt-0" type="radio" value="3" {{ $question->answer == 3 ? 'checked' : '' }} aria-label="Radio button for following text input">
                                                </label>
                                                <input type="text" class="form-control" name="option[option2]" value="{{ $optionItem[2] ?? "C"  }}" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group mb-1">
                                                <label for="option3" class="input-group-text">
                                                    <input id="option3" name="answer" class="form-check-input mt-0" type="radio" value="2" {{ $question->answer == 2 ? 'checked' : '' }} aria-label="Radio button for following text input">
                                                </label>
                                                <input type="text" class="form-control" name="option[option3]" value="{{ $optionItem[1] ?? "B"  }}" aria-label="Text input with radio button">
                                            </div>
                                            <div class="input-group">
                                                <label for="option4" class="input-group-text">
                                                    <input id="option4" name="answer" class="form-check-input mt-0" type="radio" value="4" {{ $question->answer == 4 ? 'checked' : '' }} aria-label="Radio button for following text input">
                                                </label>
                                                <input type="text" class="form-control" name="option[option4]" value="{{ $optionItem[3] ?? "D"  }}" aria-label="Text input with radio button">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <textarea placeholder="Input Your Question" name="explanation" class="form-control editor" rows="1">{!! $question->explanation !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary shadow float-end">Save Question</button> &nbsp;&nbsp;
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        new FroalaEditor('textarea',{
            imageUploadParam: 'image_param',
            imageUploadMethod: 'POST',
            imageUploadURL: '{{ route('editor.image.upload') }}',
            imageUploadParams: {
                froal:true,
                _token:"{{ csrf_token() }}"
            }
        });
    </script>
@endsection
