@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="d-inline-block bg-secondary p-2 float-end rounded">
{{--                <a href="" class="btn text-white float-end"><i class="mdi mdi-download"></i> Download</a>--}}
                <a href="{{ route('student.invoice') }}" class="btn btn-sm text-white float-end"> <i class="mdi mdi-arrow-left"></i> Go Back</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   <div class="row mb-5">
                       <div class="col-md-12">
                           <div class="d-flex justify-content-between">
                               <div class="">
                                   <h1 class="">Invoice</h1>
                                   <h4>{{ $invoice->created_at->format("d-M-Y H:s A") }}</h4>
                               </div>
                               <div class="">
                                   <div class="mx-auto text-center right-0" style="width: 100px;">
                                       <img style="width: 100%;height: 100%;" src="{{ asset('/') }}frontend/images/athena_logo.png" alt="">
                                   </div>
                                   <h3>Status : Approve To Course</h3>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row mt-5 pt-5">
                        <div class="col-md-6">
                            <h2>Payment Received From </h2>
                            <div class="">
                                <h3>{{ auth()->user()->name ?? "Student Name" }}</h3>
                                <h3>{{ auth()->user()->phone ?? "Phone Number" }}</h3>
                                <h3>{{ auth()->user()->email ?? "Email Address" }}</h3>
                                <h3>{{ auth()->user()->institute ?? "Institute Name" }}</h3>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h2>Paid To </h2>
                            <div class="">
                                <h3>Athena Science Academy</h3>
                                <h3>Green Road , Faramget , Dhaka , Bangladesh</h3>
                                <h3><a href="{{ route('frontend.v2.home') }}"><i class="mdi mdi-web"> </i> {{ route('frontend.v2.home') }}</a></h3>
                                <h3><a href="{{ get_setting('fb_url') }}"><i class="mdi mdi-facebook"> </i> {{ get_setting('fb_url') ?? 'https://www.facebook.com' }}</a></h3>
                            </div>
                        </div>
                    </div>
                   <div class="row mt-5 pt-5">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Invoice Id</th>
                                        <th>Course Name</th>
                                        <th>Payment Id</th>
                                        <th>Payment Method</th>
                                        <th>Payment At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $invoice->unique_id ?? 'Unique Id'}}</td>
                                        <td>{{ $invoice->course->title ?? 'Course Name'}}</td>
                                        <td>{{ $invoice->payment->unique_id ?? 'Unique Id'}}</td>
                                        <td>{{ $invoice->payment->method ?? "Payment method"}}</td>
                                        <td>{{ $invoice->payment->created_at->format('d-m-y H:s a')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                   </div>
                    <div class="row mt-4">
                        <div class="col-md-6 mx-auto">
                            <div class="input-group">
                                <input class="form-control" id="copyFbAccessCode" value="{{ $invoice->facebook_group_code ?? "Facebook Group Access Code" }}" readonly type="text">
                                <button class="btn btn-primary" onclick="copyFbAccessCode()">Copy Access Code</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p>{!! get_setting('invoice_content_one') !!}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a href="{{$invoice->course->courseDetails->fb_private_discussion_group ?? ''}}" class="btn btn-primary" target="_blank">
                                <i class="mdi mdi-facebook"></i> Join Our Private Facebook Group</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('frontend.v2.home') }}" class="btn btn-primary">
                                <i class="mdi mdi-web"></i> Join Our Athena Science Academy </a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p>{!! get_setting('invoice_content_two') !!}</p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p>{!! get_setting('invoice_footer_content') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function copyFbAccessCode() {
            const url = document.getElementById('copyFbAccessCode').value;
            navigator.clipboard.writeText(url);
            Toast.fire({
                icon: 'success',
                title: 'Code Copy successfully'
            })
        }
    </script>
@endsection
