@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course : {{ $course->title ?? '' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }} <span class="badge badge-success-lighten">{{$course->discounts->count()}}</span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                        @can('Discount.Create')
                            <a href="{{ route('admin.discount.create') }}" class="btn btn-success btn-sm float-end" style="margin-right: 20px;"><i class="mdi mdi-plus"></i>Add Discount</a>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Discount</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course->discounts as $discount)
                                <tr>
                                    <th>{{$loop->iteration }}</th>
                                    <th>
                                        <div class="fw-bold text-danger text-center">{{ $discount->code }}</div>
                                    </th>
                                    <th>{{ $discount->title ?? '' }}</th>
                                    <td>{{ $discount->discount ?? '' }}</td>
                                    <td>
                                        @can('Discount.Edit')
                                            <a href="{{ route('admin.discount.edit',$discount->id) }}" class="btn btn-dark btn-sm"><i class="mdi mdi-book-edit"></i>Edit</a>
                                        @endcan
                                        @can('Discount.Delete')
                                            <a href="Javascript:void(0);" onclick="deleteData({{ $discount->id }})" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can"></i>Delete</a>
                                            <form action="{{ route('admin.discount.destroy',$discount->id) }}" id="delete-form-{{$discount->id}}" method="post">@csrf @method('DELETE')</form>
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
