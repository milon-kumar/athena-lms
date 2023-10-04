@extends('backend.student.layouts.app')
@section('title',$title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark text-white text-center">
                <div class="card-body">
                    <h2>{{ $title ?? '' }}</h2>
                    <h5>Course : {{ $course->title ?? '' }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="d-inline-block">All Complains - ( {{ $complains->count() }} )</h5>
                        <a href="{{ route('student.complain.create') }}" class="btn btn-success btn-sm float-end"><i class="mdi mdi-plus"></i> Create Complain</a>
                 </div>
                <div class="card-body">
                    <div class="row h-100">
                        @foreach($complains as $complain)
                            <div class="col-md-6 h-100">
                                <div class="card border border-dark shadow h-100">
                                    <div class="card-header bg-dark text-white">
                                        <a href=" {{ route('student.complain.show',$complain->id) }} ">
                                            <h4 class="d-inline-block float-start text-white">{{ $complain->type ?? '' }}</h4>
                                        </a>
                                        @if(auth()->id() == $complain->user_id)
                                            <a href="Javascript:void(0)" onclick="deleteData({{ $complain->id }})" class="btn btn-danger btn-sm float-end"> <i class="mdi mdi-trash-can"> </i></a>
                                            <form action="{{ route('admin.complain.destroy',$complain->id) }}" id="delete-form-{{$complain->id}}" class="d-none" method="post">@csrf @method('DELETE')</form>
                                        @endif
                                    </div>
                                    <div class="card-body text-dark">
                                        <small class="d-block mb-2">Create Time : {{ $complain->created_at->diffForHumans() }}</small>
                                        <hr/>
                                        <p class="fw-bold">{{ \Illuminate\Support\Str::limit($complain->message,100) ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
