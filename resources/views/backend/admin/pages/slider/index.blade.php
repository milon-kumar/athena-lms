@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline-block">All Slider <span class="badge badge-success-lighten">{{ $sliders->count() ?? 0 }}</span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped border border-dark text-dark">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Image (W-1350 by H-500)</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            @can('Slider.Create')
                                @include('backend.admin.components.module.slider.create_form')
                            @endcan

                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>Image - {{ $slider->serial ?? $loop->iteration }}</td>
                                        <td>
                                            <div class="" style="height: 200px;overflow: hidden;margin: 0 auto;">
                                                <img src="{{ asset($slider->image) ?? defaultImage() }}" style="width: 100%;height: 100%;" class="img-fluid" alt="Slider Image">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ $slider->link ?? '' }}" target="_blank">{{ Str::limit($slider->link , 20) }}</a>
                                        </td>
                                        <td>
                                            @can('Slider.Edit')
                                            <a href="{{ route('admin.slider.edit',$slider->id ?? '') }}" class="btn btn-success">
                                                <i class="mdi mdi-book-edit"></i>
                                            </a>
                                            @endcan
                                            @can('Slider.Delete')
                                            <a href="" class="btn btn-danger" onclick="deleteData({{ $slider->id }})">
                                                <i class="mdi mdi-trash-can"></i>
                                            </a>
                                            <form action="{{ route('admin.slider.destroy',$slider->id) }}" id="delete-form-{{$slider->id}}" method="post" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
