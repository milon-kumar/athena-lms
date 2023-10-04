@extends('frontend.v2.layout.app')
@section('title',$title)
@section('content')
    <section>
        <div class="container">
            <div class="row my-5 py-5">
                <div class="col-md-7 mx-auto">
                    <div class="card">

                        <div class="card-body">
                            <h1>Login Now </h1>
                            <hr/>

                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email Address">
                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Your Password">
                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary float-end">Login Now...</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
