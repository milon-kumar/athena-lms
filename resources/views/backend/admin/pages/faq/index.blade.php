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
                        <h3 class="header-title d-inline"> {{ $title }} <span class="badge badge-success-lighten"> {{$faqs->count()}}</span></h3>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Faq.Create')
                            <a href="{{ route('admin.faq.create') }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;">
                                <i class="mdi mdi-plus"></i>Add Faq</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark table-responsive">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-left">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $key => $faq)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>
                                       {{ $faq->title ?? ' ' }}
                                    </td>
                                    <td>
                                        <p>{!! \Illuminate\Support\Str::limit($faq->description,50) ?? '' !!}</p>
                                    </td>
                                    <td>
                                        @can('Faq.Edit')
                                            <a href="{{ route('admin.faq.edit',$faq->id ?? '') }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i> Edit</a>
                                        @endcan
                                        @can('Faq.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $faq->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i> Delete </a>
                                            <form action="{{ route('admin.faq.destroy',$faq->id) }}" method="post" id="delete-form-{{$faq->id}}">@csrf @method('DELETE')</form>
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
