@extends('backend.admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">Hyper</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="javascript: void(0);">Forms</a>
                            </li>
                            <li class="breadcrumb-item active">Form Advanced</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Header Basic Setting</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Header Top Setting
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{route('admin.setting.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-3 col-form-label">Website Logo</label>
                                <div class="col-9">
                                    <input type="hidden" name="key[]" value="website_logo">
                                    <input class="form-control dropify" name="website_logo" type="file" id="">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-3 col-form-label">Icon</label>
                                <div class="col-9">
                                    <input type="hidden" name="key[]" value="website_icon">
                                    <input class="form-control dropify" name="website_icon" type="file" id="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-3 col-form-label">Web Site Title</label>
                                <div class="col-9">
                                    <input type="hidden" name="key[]" value="website_title">
                                    <input type="text" class="form-control" name="website_title" id="" placeholder="Website Title">
                                </div>
                            </div>
                            <div class="justify-content-end row">
                                <div class="col-9">
                                    <button type="submit" class="btn btn-info float-end">Update</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
