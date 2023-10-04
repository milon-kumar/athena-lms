@extends('backend.student.layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">All Videos</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ $chapter->name ?? '' }}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">{{ $chapter->videos->count() > 1 ?$chapter->videos->count().'- Videos' : $chapter->videos->count().'- Video'}}</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <tr>
                                        <th>#SL</th>
                                        <th>Class Name</th>
                                        <th>View Count</th>
                                        <th>Preview</th>
                                    </tr>
                                    @foreach($chapter->videos as $video)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $video->video_title ?? '' }}</td>
                                            <td>
                                                <a href="{{ route('student.show-video',$video->id ?? '') }}" class="btn btn-success">Preview</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
