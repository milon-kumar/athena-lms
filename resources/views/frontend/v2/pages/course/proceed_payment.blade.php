@extends('frontend.v2.layout.app')
@section('content')
    <!-- Page header -->
    <section class="py-lg-6 py-4 bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white display-4 mb-0">কোর্সটিতে এনরোল করো </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->
    <section class="py-6">
        <div class="container">
            <form action="{{ route('frontend.enrole.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="course_id" value="">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-12 order-2 order-lg-1">
                        <div class="card rounded-3">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0 p-0">
                                <div>
                                    <!-- Nav -->
                                    <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="table-tab" data-bs-toggle="pill"
                                               href="#table" role="tab" aria-controls="table"
                                               aria-selected="true">Manual Payment</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="description-tab" data-bs-toggle="pill"
                                               href="#description" role="tab" aria-controls="description"
                                               aria-selected="false">Pay With SSLcommerz</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="table" role="tabpanel"
                                         aria-labelledby="table-tab">
                                        <!-- Card -->
                                        <div class="accordion" id="courseAccordion">
                                            <div class="card  mb-4">
                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <h4 class="mb-0">Payment Details</h4>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <!-- Form -->
                                                    <div class="row gx-3">
                                                        <!-- First name  -->
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label class="form-label" for="">Payment Method Bkash/Nagad/Rocket (কিভাবে পেমেন্ট করেছেন বিকাশ/নগদ/রকেট)<span class="text-danger fw-bold">*</span></label>
                                                            <select name="method" class="form-control" id="" required>
                                                                <option value="bkash">Bkash</option>
                                                                <option value="nogod">Nogod</option>
                                                                <option value="rocket">Rocket</option>
                                                            </select>
                                                        </div>
                                                        <!-- Payment Sended Number  -->
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label class="form-label" for="number">From which number you paid (কোন নাম্বার হতে কোর্স ফি দিয়েছেন লিখবেন)</label>
                                                            <input type="text"
                                                                   id="number"
                                                                   name="number"
                                                                   value="{{ old('number') }}"
                                                                   class="form-control @error('number') is-invalid @enderror"
                                                                   placeholder="017 ** *** ***">
                                                            @error('number')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <!-- Payment Transition Id  -->
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label class="form-label" for="transition_id">Payment Transition ID (পেমেন্ট এর ট্রানজেকশন আইডি লিখবেন)</label>
                                                            <input type="text"
                                                                   id="transition_id"
                                                                   name="transition_id"
                                                                   value="{{ old('transition_id') }}"
                                                                   class="form-control @error('transition_id') is-invalid @enderror"
                                                                   placeholder="tran2254">
                                                            @error('transition_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <!-- Payment Date And time  -->
                                                        <div class="mb-3 col-12 col-md-6">
                                                            <label class="form-label" for="date">Date and Time of Payment (পেমেন্ট এর তারিখ ও সময় লিখবেন)</label>
                                                            <input type="datetime-local"
                                                                   id="date" name="date"
                                                                   value="{{ old('date') }}"
                                                                   class="form-control @error('date') is-invalid @enderror">
                                                            @error('date')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <button class="btn btn-lg btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description" role="tabpanel"
                                         aria-labelledby="description-tab">
                                        <!-- Description -->
                                        <div class="mb-4">
                                            <h3 class="mb-2">Coming Soon.........</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 order-1 order-lg-2 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <h1>Your Course Title Here</h1>
                                <h3>Your Payable Amount : 17000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
