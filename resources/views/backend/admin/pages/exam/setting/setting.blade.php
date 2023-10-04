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

        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
            <li class="nav-item">
                <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span class="d-none d-md-block">Question Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#settings1" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                    <span class="d-none d-md-block">Add Question</span>
                </a>
            </li>
        </ul>
        <form action="{{ route('admin.exam.exam.store') }}" class="tab-content" method="POST" enctype="multipart/form-data">
            <div class="tab-content">
            @csrf
            <div class="tab-pane show active" id="profile1">
                <div class="row">
                    <div class="col-12">
                        <div class="card border border-secondary">
                            <div class="card-header bg-dark text-white">
                                <h4>Basic Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Exam Name</label>
                                    <input type="text" id="simpleinput" name="name" class="form-control">
                                    <input type="hidden" id="simpleinput" name="type" value="image" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Introduction</label>
                                    <p>This text is displayed at the top of the test. You can use it to write your instructions or anything else. It can be blank.</p>
                                    <textarea name="description" class="form-control editor" id="" rows="3"></textarea>
                                </div>

                                <h4>Other Settings</h4>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="is_random" class="form-check-input" id="random_question">
                                        <label class="form-check-label" for="random_question"> Randomize the order of the questions during the test</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="blank_submit" class="form-check-input" id="blank_answer">
                                        <label class="form-check-label" for="blank_answer">  Allow students to submit blank/empty answers</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="incorrect_answer" class="form-check-input" id="negative_marking">
                                        <label class="form-check-label" for="negative_marking"> Penalize incorrect answers (negative marking)</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="">This text is displayed after the test is submitted.</label>
                                    <textarea name="conclusion_text" class="form-control editor" id="" rows="3"></textarea>
                                </div>

                                <h4>
                                    <input type="checkbox" name="pass_message" class="form-check-input" id="pass_message">
                                    <label for="pass_message">Show a custom message if the student passed or failed</label>
                                </h4>
                                <div class="">
                                    <h4>What is the passing score?</h4>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="passing_score">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Pass Message</label>
                                        <p>If the student passes, this text is displayed:</p>
                                        <textarea name="pass_message" class="form-control editor" id="" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Fail Message</label>
                                        <p>If the student fails, this text is displayed:</p>
                                        <textarea name="fail_message" class="form-control editor" id="" rows="3"></textarea>
                                    </div>
                                </div>
                                <h4>At the end of the test, display the user's:</h4>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" class="form-check-input" id="randomize_order">
                                        <label class="form-check-label" for="randomize_order"> Randomize the order of the questions during the test</label>
                                    </div>
                                </div>

                                <h4>Test outline [?]</h4>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="class_recorded" class="form-check-input" id="correct_incorrect">
                                        <label class="form-check-label" for="correct_incorrect"> Indicate if their response was correct or incorrect</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="display_answer" class="form-check-input" id="display_correct_answer">
                                        <label class="form-check-label" for="display_correct_answer">Display the correct answer </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" name="display_explanation" class="form-check-input" id="display_explanation">
                                        <label class="form-check-label" for="display_explanation">Display the explanation</label>
                                    </div>
                                </div>

                                <h4>Access Control</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Who can take your test?</h5>
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="text" name="password" value="passcord" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="number" name="minutes" value="anyone" class="form-control" placeholder="Exam Duration">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input type="number" name="times" class="form-control" placeholder="Exam Time">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="settings1">
                <div class="card-body">
                    <div class="row" id="addRowHere">
                        <div id="addCOlumn" class="col-md-12">
                            <div class="card shadow border border-secondary">
                                <div class="card-body">
                                    <div class="mb-2">
                                        <textarea placeholder="Input Your Question" name="questions[question][q]" class="form-control editor" rows="1"></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <label for="option1" class="input-group-text">
                                                        <input id="option1" name="questions[question][answer]" class="form-check-input mt-0" type="radio" value="1" aria-label="Radio button for following text input">
                                                    </label>
                                                    <input type="text" class="form-control" name="questions[question][option][option1]" value="A" aria-label="Option One">
                                                </div>
                                                <div class="input-group">
                                                    <label for="option2"  class="input-group-text">
                                                        <input id="option2" name="questions[question][answer]" class="form-check-input mt-0" type="radio" value="3" aria-label="Radio button for following text input">
                                                    </label>
                                                    <input type="text" class="form-control" name="questions[question][option][option2]" value="C" aria-label="Text input with radio button">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-1">
                                                    <label for="option3" class="input-group-text">
                                                        <input id="option3" name="questions[question][answer]" class="form-check-input mt-0" type="radio" value="2" aria-label="Radio button for following text input">
                                                    </label>
                                                    <input type="text" class="form-control" name="questions[question][option][option3]" value="B" aria-label="Text input with radio button">
                                                </div>
                                                <div class="input-group">
                                                    <label for="option4" class="input-group-text">
                                                        <input id="option4" name="questions[question][answer]" class="form-check-input mt-0" type="radio" value="4" aria-label="Radio button for following text input">
                                                    </label>
                                                    <input type="text" class="form-control" name="questions[question][option][option4]" value="D" aria-label="Text input with radio button">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <textarea placeholder="Input Your Question" name="questions[question][explanation]" class="form-control editor" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary shadow float-end">Save Question</button> &nbsp;&nbsp;
                    <a id="addFiled" class="btn btn-sm btn-dark shadow float-end">+ Add Question</a>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        new FroalaEditor('textarea',{
            imageUploadParam: 'image_param',
            imageUploadMethod: 'POST',
            imageMultipleStyles: true,
            imageUploadURL: '{{ route('editor.image.upload') }}',
            imageUploadParams: {
                froal:true,
                _token:"{{ csrf_token() }}"
            }
        });

        var switchLabelName = 0;
        $('#addFiled').click(()=>{
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
                                            <input id="option1-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="1" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option1]" value="A" aria-label="Option One">
                                    </div>
                                    <div class="input-group">
                                        <label for="option2-${switchLabelName}"  class="input-group-text">
                                            <input id="option2-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="3" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option2]" value="C" aria-label="Text input with radio button">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <label for="option3-${switchLabelName}" class="input-group-text">
                                            <input id="option3-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="2" aria-label="Radio button for following text input">
                                        </label>
                                        <input type="text" class="form-control" name="questions[question${switchLabelName}][option][option3]" value="B" aria-label="Text input with radio button">
                                    </div>
                                    <div class="input-group">
                                        <label for="option4-${switchLabelName}" class="input-group-text">
                                            <input id="option4-${switchLabelName}" name="questions[question${switchLabelName}][answer]" class="form-check-input mt-0" type="radio" value="4" aria-label="Radio button for following text input">
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
                new FroalaEditor(this,{
                    imageUploadParam: 'image_param',
                    imageUploadMethod: 'POST',
                    imageUploadURL: '{{ route('editor.image.upload') }}',
                    imageUploadParams: {
                        froal:true,
                        _token:"{{ csrf_token() }}"
                    }
                });
            });
        });

        $("#removeRow").click(()=>{
            $(this).closest().remove();
        });

        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputRow').remove();
        });

        function setId(id) {
            console.log(id);
            $.post('{{ route('set-chapter-id') }}' , {chapter_id:id} , function (response) {
                console.log(response);
            });
        }
        new FroalaEditor('.editor');
    </script>
@endsection
