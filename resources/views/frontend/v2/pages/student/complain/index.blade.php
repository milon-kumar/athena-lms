@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @include('frontend.v2.components.student.complain.complain_top_bar')
    <div class="row">
        @forelse($complains as $complain)
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <div class="card mb-3 h-100">
                    <!-- Card Body -->
                    <div class="card-body">
                        <h4 class="mb-2 text-truncate-line-2 ">
                            <a href="javascript:void(0)" class="text-inherit">{{ $complain->type?? '' }}</a>
                        </h4>
                        <!-- List -->
                        <ul class="mb-3 list-inline">
                            <li class="list-inline-item"><i class="mdi mdi-clock-time-four-outline text-muted me-1"></i>{{ $complain->created_at->diffForHumans() }}</li>
                        </ul>
                        <p>{!! $complain->message ?? '' !!}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center g-0">
                            <div class="col-auto">
                                <a href="#" class="text-primary btn btn-sm complain-edit">
                                    <i class="mdi mdi-briefcase-edit"></i>
                                </a>
{{--                                <a href="#" class="text-danger btn btn-sm complain-delete">--}}
{{--                                    <i class="mdi mdi-trash-can"></i>--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center">No Complain Found</h1>
                </div>
            </div>
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        tippy(".complain-edit",{content:"Edit",theme:"light",animation:"scale"});
        tippy(".complain-delete",{content:"Delete",theme:"light",animation:"scale"});
    </script>
@endsection
