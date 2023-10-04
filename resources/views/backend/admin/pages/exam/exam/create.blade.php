@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <p>Create A New Exam With All Settings eeeeeeeeeeeeeee</p>
                        <a href="{{ route('admin.exam.dashboard') }}" class="btn btn-danger btn-sm">Exam Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.exam.exam.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Exam Info
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="name">Exam Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Input Your Exam name">
                            </div>
                            <div class="mb-2">
                                <label for="description">Introduction</label>
                                <textarea name="description"
                                          id="description"
                                          class="form-control"
                                          rows="2"
                                          placeholder="Introduction About This Exam"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="conclusion_text">The test is submitted text</label>
                                    <textarea name="conclusion_text"
                                              id="conclusion_text"
                                              class="form-control"
                                              rows="2"
                                              placeholder="Test is submitted text"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="pass_message">Passed Message</label>
                                    <textarea name="pass_message"
                                              id="pass_message"
                                              class="form-control"
                                              rows="2"
                                              placeholder="Passed message for student"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="fail_message">Fails Message</label>
                                    <textarea name="fail_message"
                                              id="fail_message"
                                              class="form-control"
                                              rows="2"
                                              placeholder="Fails message for student"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Others Setting
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-checkbox-secondary border-secondary mb-2 d-flex">
                                            <input type="checkbox"
                                                   name="is_random"
                                                   value="true"
                                                   id="is_random"
                                                   class="border-secondary"
                                                   data-switch="secondary"/>
                                            <label for="is_random" data-on-label="Yes" data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;"
                                                   for="is_random">Randomize the order of the questions during the
                                                test</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-checkbox-secondary border-secondary mb-2 d-flex">
                                            <input type="checkbox"
                                                   name="blank_answer"
                                                   value="true"
                                                   id="blank_answer"
                                                   class="border-secondary"
                                                   data-switch="secondary"/>
                                            <label for="blank_answer" data-on-label="Yes" data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;"
                                                   for="blank_answer">Allow students to submit blank/empty
                                                answers</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-checkbox-secondary border-secondary mb-2 d-flex">
                                            <input type="checkbox"
                                                   name="incorrect_answer"
                                                   value="true"
                                                   id="incorrect_answer"
                                                   class="border-secondary"
                                                   data-switch="secondary"/>
                                            <label for="incorrect_answer" data-on-label="Yes"
                                                   data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;"
                                                   for="incorrect_answer">Penalize incorrect answers (negative
                                                marking)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-checkbox-secondary border-secondary mb-2 d-flex">
                                            <input type="checkbox"
                                                   name="correct_incorrect"
                                                   value="true"
                                                   id="correct_incorrect"
                                                   class="border-secondary"
                                                   data-switch="secondary"/>
                                            <label for="correct_incorrect" data-on-label="Yes"
                                                   data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;"
                                                   for="correct_incorrect">Indicate if their response was correct or
                                                incorrect</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-checkbox-secondary border-secondary mb-2 d-flex">
                                            <input type="checkbox"
                                                   name="display_correct_answer"
                                                   value="true"
                                                   id="display_correct_answer"
                                                   class="border-secondary"
                                                   data-switch="secondary"/>
                                            <label for="display_correct_answer" data-on-label="Yes"
                                                   data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;"
                                                   for="display_correct_answer">Display the correct answer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-check form-checkbox-secondary border-secondary mb-2 d-flex">
                                            <input type="checkbox"
                                                   name="display_explanation"
                                                   value="true"
                                                   id="display_explanation"
                                                   class="border-secondary"
                                                   data-switch="secondary"/>
                                            <label for="display_explanation" data-on-label="Yes"
                                                   data-off-label="No"></label>&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label ml-4 fw-bold" style="cursor: pointer;"
                                                   for="display_explanation">Display the explanation</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="password">Exam Password</label>
                                    <input type="text"
                                           class="form-control"
                                           name="password"
                                           placeholder="Exam Password">
                                </div>
                                <div class="col-md-3">
                                    <label for="times">How many times can you give the exam?</label>
                                    <input type="number"
                                           class="form-control"
                                           name="times"
                                           placeholder="How many times ?">
                                </div>
                                <div class="col-md-3">
                                    <label for="minutes">Exam time</label>
                                    <input type="number"
                                           class="form-control"
                                           name="minutes"
                                           placeholder="Exam time">
                                </div>
                                <div class="col-md-3">
                                    <label for="minutes">Pass Schore ( 60 % )</label>
                                    <input type="number"
                                           class="form-control"
                                           name="pass_mark"
                                           placeholder="Enter Pass Mark">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                           Setup Your Questions
                        </div>
                        <div class="card-body">
                            <div class="row" id="addRowHere">
                                <div id="addCOlumn" class="col-md-12">
                                    <div class="card shadow border border-secondary">
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <textarea placeholder="Input Your Question"
                                                          name="questions[question][q]" class="form-control editor"
                                                          rows="1"></textarea>
                                            </div>
                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1">
                                                            <label for="option1" class="input-group-text">
                                                                <input id="option1"
                                                                       name="questions[question][answer]"
                                                                       class="form-check-input mt-0"
                                                                       type="radio"
                                                                       value="option1"
                                                                       aria-label="Radio button for following text input">
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   name="questions[question][option][option1]" value="A"
                                                                   aria-label="Option One">
                                                        </div>
                                                        <div class="input-group">
                                                            <label for="option2" class="input-group-text">
                                                                <input id="option2"
                                                                       name="questions[question][answer]"
                                                                       class="form-check-input mt-0"
                                                                       type="radio"
                                                                       value="option3"
                                                                       aria-label="Radio button for following text input">
                                                            </label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="questions[question][option][option3]"
                                                                   value="C"
                                                                   aria-label="Text input with radio button">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-1">
                                                            <label for="option3" class="input-group-text">
                                                                <input id="option3"
                                                                       name="questions[question][answer]"
                                                                       class="form-check-input mt-0"
                                                                       type="radio"
                                                                       value="option2"
                                                                       aria-label="Radio button for following text input">
                                                            </label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="questions[question][option][option2]"
                                                                   value="B"
                                                                   aria-label="Text input with radio button">
                                                        </div>
                                                        <div class="input-group">
                                                            <label for="option4" class="input-group-text">
                                                                <input id="option4"
                                                                       name="questions[question][answer]"
                                                                       class="form-check-input mt-0"
                                                                       type="radio"
                                                                       value="option4"
                                                                       aria-label="Radio button for following text input">
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                   name="questions[question][option][option4]"
                                                                   value="D"
                                                                   aria-label="Text input with radio button">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <textarea placeholder="Input Your Question"
                                                          name="questions[question][explanation]"
                                                          class="form-control editor"
                                                          rows="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a id="addFiled" class="btn btn-sm btn-dark shadow float-end">+ Add Question</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-dark float-end">Submit Question</button>
        </form>

    </div>

@endsection
@section('script')
    <script>
            {{--new FroalaEditor('textarea',{--}}
            {{--    imageUploadParam: 'image_param',--}}
            {{--    imageUploadMethod: 'POST',--}}
            {{--    imageMultipleStyles: true,--}}
            {{--    imageUploadURL: '{{ route('editor.image.upload') }}',--}}
            {{--    imageUploadParams: {--}}
            {{--        froal:true,--}}
            {{--        _token:"{{ csrf_token() }}"--}}
            {{--    }--}}
            {{--});--}}

        var switchLabelName = 0;
        $('#addFiled').click(() => {
            switchLabelName = switchLabelName + 1;
            // console.log(switchLabelName)
            var row = `
            <div class="col-md-12" id="inputRow">
                <div class="card shadow border border-secondary">
                    <div class="card-body">
                        <div class="mb-2">
                            <textarea id="textarea-${switchLabelName}" name="questions[question${switchLabelName}][q]" placeholder="Input Your Question" class="form-control editor-${switchLabelName}" rows="1"></textarea>
                        </div>
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <label for="option1-${switchLabelName}" class="input-group-text">
                                            <input id="option1-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="option1" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option1]" value="A" aria-label="Option One">
                                    </div>
                                    <div class="input-group">
                                        <label for="option2-${switchLabelName}"  class="input-group-text">
                                            <input id="option2-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="option3" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option3]" value="C" aria-label="Text input with radio button">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <label for="option3-${switchLabelName}" class="input-group-text">
                                            <input id="option3-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="option2" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option2]" value="B" aria-label="Text input with radio button">
                                    </div>
                                    <div class="input-group">
                                        <label for="option4-${switchLabelName}" class="input-group-text">
                                            <input id="option4-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="option4" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option4]" value="D" aria-label="Text input with radio button">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <textarea placeholder="Input Your Question" name="questions[question${switchLabelName}][explanation]" class="form-control editor-${switchLabelName}" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
                    </div>
                </div>
            </div>`
            ;

            $("#addRowHere").append(row);

            $("#addRowHere").find(`.editor-${switchLabelName}`).each(function () {
                new FroalaEditor(this, {
                    imageUploadParam: 'image_param',
                    imageUploadMethod: 'POST',
                    imageUploadURL: '{{ route('editor.image.upload') }}',
                    imageUploadParams: {
                        froal: true,
                        _token: "{{ csrf_token() }}"
                    }
                });
            });
        });

        $("#removeRow").click(() => {
            $(this).closest().remove();
        });

        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputRow').remove();
        });

        function setId(id) {
            console.log(id);
            $.post('{{ route('set-chapter-id') }}', {chapter_id: id}, function (response) {
                console.log(response);
            });
        }

        new FroalaEditor('.editor');
    </script>
@endsection
