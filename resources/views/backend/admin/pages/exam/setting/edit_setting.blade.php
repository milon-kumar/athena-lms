
@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <a href="{{ route('admin.exam.dashboard',$exam->type) }}" class="btn btn-danger btn-sm">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    <section>
        <div class="row">
            <form action="{{ route('admin.exam.exam.update',$exam->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                                           value="{{ $exam->name ?? "Exam Title" }}"
                                           placeholder="Input Your Exam name">
                                </div>
                                <div class="mb-2">
                                    <label for="description">Introduction</label>
                                    <textarea name="description"
                                              id="description"
                                              class="form-control"
                                              rows="2"
                                              placeholder="Introduction About This Exam">{!! $exam->description ?? "Exam Description" !!}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="conclusion_text">The test is submitted text</label>
                                        <textarea name="conclusion_text"
                                                  id="conclusion_text"
                                                  class="form-control"
                                                  rows="2"
                                                  placeholder="Test is submitted text">{!! $exam->conclusion_text ?? "" !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pass_message">Passed Message</label>
                                        <textarea name="pass_message"
                                                  id="pass_message"
                                                  class="form-control"
                                                  rows="2"
                                                  placeholder="Passed message for student">{!! $exam->pass_message ?? "" !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fail_message">Fails Message</label>
                                        <textarea name="fail_message"
                                                  id="fail_message"
                                                  class="form-control"
                                                  rows="2"
                                                  placeholder="Fails message for student">{!! $exam->fail_message ?? "" !!}</textarea>
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
                                                       {{ $exam->is_random ? 'checked' : '' }}
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
                                                       {{ $exam->blank_answer ? 'checked' : '' }}
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
                                                       {{ $exam->incorrect_answer ? 'checked' : '' }}
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
                                                       {{ $exam->correct_incorrect ? 'checked' : '' }}
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
                                                       {{ $exam->display_correct_answer ? 'checked' : '' }}
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
                                                       {{ $exam->display_explanation ? 'checked' : '' }}
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
                                               value="{{ $exam->password ?? "" }}"
                                               placeholder="Exam Password">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="times">How many times can you give the exam?</label>
                                        <input type="number"
                                               class="form-control"
                                               name="times"
                                               value="{{ $exam->times ?? "" }}"
                                               placeholder="How many times ?">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="minutes">Exam time</label>
                                        <input type="number"
                                               class="form-control"
                                               name="minutes"
                                               value="{{ $exam->minutes ?? "" }}"
                                               placeholder="Exam time">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="minutes">Pass Schore ( 60 % )</label>
                                        <input type="number"
                                               class="form-control"
                                               name="pass_mark"
                                               value="{{ $exam->pass_mark }}"
                                               placeholder="Enter Pass Mark">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <button class="btn btn-dark btn-lg float-end" type="submit">Update Exam</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
