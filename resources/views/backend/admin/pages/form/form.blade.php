@extends('backend.admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Advanced</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Advanced</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Form Element</h4>
                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <button id="addFiled" class="btn btn-success btn-sm float-end">Add More</button>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <form action="{{route('admin.form-submit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                  {{--              <div class="tab-pane show active" id="addRowHere">
                                    <div class="row mb-2">
                                        <div class="col-lg-4">
                                            <input type="text" name="name[]" class="form-control">
                                        </div> <!-- end col -->
                                        <div class="col-lg-4">
                                            <input type="file" name="image[]" class="form-control">
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div> <!-- end preview-->
                                --}}





                                <input type="text" name="questions[question][q]" />
                                <input type="text" name="questions[question][answer]" />
                                <input type="text" name="questions[question][option][option1]" />
                                <input type="text" name="questions[question][option][option2]" />
                                <input type="text" name="questions[question][option][option3]" />
                                <input type="text" name="questions[question][option][option4]" />
                                <br>
                                <br>

                                <input type="text" name="questions[question1][q]" />
                                <input type="text" name="questions[question][answer]" />
                                <input type="text" name="questions[question1][option][option1]" />
                                <input type="text" name="questions[question1][option][option2]" />
                                <input type="text" name="questions[question1][option][option3]" />
                                <input type="text" name="questions[question1][option][option4]" />
                                <br>
                                <br>

                                <input type="text" name="questions[question2][q]" />
                                <input type="text" name="questions[question][answer]" />
                                <input type="text" name="questions[question2][option][option1]" />
                                <input type="text" name="questions[question2][option][option2]" />
                                <input type="text" name="questions[question2][option][option3]" />
                                <input type="text" name="questions[question2][option][option4]" />

                                <button class="btn btn-success btn-sm float-end">Save Data</button>
                            </form>

                        </div> <!-- end tab-content-->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
@section('script')
    <script>
        $('#addFiled').click(()=>{
            var row = `
            <div class="row mb-2" id="inputRow">
                <div class="col-lg-4">
                    <input type="text" name="name[]" class="form-control">
                </div>
                <div class="col-lg-4">
                    <input type="file" name="image[]" class="form-control">
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-sm btn-danger shadow" id="removeRow">Remove</button>
                </div>
            </div> `;
            $("#addRowHere").append(row);
        });

        $("#removeRow").click(()=>{
            $(this).closest().remove();
        });

        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputRow').remove();
        });
    </script>
@endsection
