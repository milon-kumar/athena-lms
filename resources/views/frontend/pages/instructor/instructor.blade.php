@extends('frontend.layout.app')
@section('content')
    <div class="main-content">
        <div class="breadcome py-5" style="background: radial-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url({{ asset('/frontend/img/bred3.jpg')}}) no-repeat ;background-size: cover;">
            <div class="container">
                <h2 class="text-center text-white">All Instructor</h2>
                <p class="text-center text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci assumenda eligendi error eum incidunt, modi, nesciunt obcaecati placeat quasi rerum saepe ullam! Asperiores atque deserunt, dolores qui quos rem.</p>
            </div>
        </div>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    @forelse($teachers as $teacher)
                        <div class="col-md-3">
                            @include('frontend.component.instractor_card')
                        </div>
                    @empty
                        <div class="card rounded-0">
                            <div class="card-body">
                                <h2 class="text-center">No Data Found</h2>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-12">
                        {!! $teachers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
