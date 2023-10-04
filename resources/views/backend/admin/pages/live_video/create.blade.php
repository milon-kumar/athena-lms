@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h4>Course : {{ $course->title  ?? '' }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.live-video.store') }}" method="post" enctype="multipart/form-data" class="card border shadow">
                    @csrf
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }}</h3>
                        <a href="{{ route('admin.live-video.index') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        <button type="submit" class="btn btn-success btn-sm d-inline-block float-end" style="margin-right: 10px;">
                            <i class="mdi mdi-content-save"></i> Save Videos
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered border border-dark text-dark">
                                <tr>
                                    <th>Serial</th>
                                    <th>Video Title</th>
                                    <th>Video Link</th>
                                    <th>Action</th>
                                </tr>
                                <tbody id="myTable">
                                <tr>
                                    <td>
                                        @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'serials[]','placeholder'=>'Serial Number'])
                                    </td>
                                    <td>
                                        @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'titles[]','placeholder'=>'Video Title'])
                                    </td>
                                    <td>
                                        @include('backend.admin.components.form_element.input',['type'=>'text','name'=>'links[]','placeholder'=>'Video Link / Tag'])
                                    </td>
                                    <td>
                                        <button id="addRowButton" class="btn btn-dark btn-sm"><i class="mdi mdi-plus"></i> Add Row</button>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let switchLabelName = 0;
        $("#addRowButton").click(function() {
            event.preventDefault();
            switchLabelName = switchLabelName + 1;
            var newRow = ` <tr>
                           <td>
                                        @include('backend.admin.components.form_element.input',['type'=>'number','name'=>'serials[]','placeholder'=>'Serial Number'])
            </td>
            <td>
@include('backend.admin.components.form_element.input',['type'=>'text','name'=>'titles[]','placeholder'=>'Video Title'])
            </td>
            <td>
@include('backend.admin.components.form_element.input',['type'=>'text','name'=>'links[]','placeholder'=>'Video Link / Tag'])
            </td>
<td>
<button id="" class="btn btn-danger btn-sm removeRowButton"><i class="mdi mdi-minus"></i> Add Row</button>
</td>
</tr>`;

            $("#myTable").append(newRow);
            $(document).on("click", ".removeRowButton", function() {
                event.preventDefault();
                $(this).closest("tr").remove();
            });
        });
    </script>
@endsection

