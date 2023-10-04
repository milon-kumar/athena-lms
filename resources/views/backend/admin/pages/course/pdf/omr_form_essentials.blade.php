@extends('backend.admin.layouts.app')
@section('title','All CQ Questions Solve')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        @include('backend.admin.components.main.pdf_tabs')
                    </div>
                    <div class="card-body">
                        <div class="p-3">
                            <h1 class="fw-bolder text-uppercase"> {{ $type }} - Table</h1>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($omr_form_essentials as $pdf)
                                        @include('backend.admin.components.main.pdf_table_content')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end preview-->
                        </div> <!-- end tab-content-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
