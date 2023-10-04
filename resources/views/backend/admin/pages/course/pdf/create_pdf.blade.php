@extends('backend.admin.layouts.app')
@section('title','Add PDF')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card border border-secondary">
                    <div class="card-body">
                        @include('backend.admin.components.main.pdf_tabs')
                    </div>
                </div>
            </div>
            <div class="col-8 mx-auto mt-3">
                <form action="{{ route('admin.pdf.pdf-store') }}" method="post" class="card border border-secondary mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Upload pdf Lecture Notes For <span class="fw-bolder text-uppercase">{{ $type }}</span></h4>
                        <p><code class="fw-bolder text-danger"> Accept Only File Type PDF *</code></p>
                    </div>
                    <div class="card-body">
                        <div class="" id="addRowHere">
                            <div class="row mb-2">
                                <div class="col-lg-3">
                                    <input type="number" name="serial[]" class="form-control" required placeholder="Serial *">
                                    <input type="hidden" value="{{ $type }}" name="type" class="form-control">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" name="title[]" required class="form-control" placeholder="PDF Title *">
                                </div>
                                <div class="col-lg-4">
                                    <input type="file" required name="pdf[]" accept="application/pdf" class="form-control" placeholder="Upload PDF *">
                                </div>

                                <div class="col-lg-1">
                                    <a id="addFiled" class="btn btn-sm btn-success shadow">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </form>
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection


@section('script')
    <script>
        var switchLabelName = 0;
        $('#addFiled').click(()=>{
            switchLabelName = switchLabelName + 1;
            console.log(switchLabelName)
            var row = `
            <div class="row mb-2" id="inputRow">
                <div class="col-lg-3">
                    <input type="number" name="serial[]" class="form-control" required placeholder="Serial *">
                    <input type="hidden" value="{{ $type }}" name="type" class="form-control">
                </div>
                <div class="col-lg-4">
                    <input type="text" name="title[]" required class="form-control" placeholder="PDF Title *">
                </div>
                <div class="col-lg-4">
                    <input type="file" required name="pdf[]" accept="application/pdf" class="form-control" placeholder="Upload PDF *">
                </div>
               <div class="col-lg-1">
                   <a class="btn btn-sm btn-danger shadow" id="removeRow">X</a>
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

        function setId(id) {
            console.log(id);
            $.post('{{ route('set-chapter-id') }}' , {chapter_id:id} , function (response) {
                console.log(response);
            });
        }
    </script>
@endsection
