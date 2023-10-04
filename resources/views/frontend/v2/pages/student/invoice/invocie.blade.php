@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                   <table class="table table-hover table-bordered table-striped">
                       <thead>
                           <tr>
                               <th>#SL</th>
                               <th>Invoice Id</th>
                               <th>Course Name</th>
                               <th>Payment Id</th>
                               <th>Payment Method</th>
                               <th>Payment At</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($invoices as $invoice)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $invoice->unique_id ?? 'Unique Id'}}</td>
                                   <td>{{ $invoice->course->title ?? 'Course Name'}}</td>
                                   <td>{{ $invoice->payment->unique_id ?? 'Unique Id'}}</td>
                                   <td>{{ $invoice->payment->method ?? "Payment method"}}</td>
                                   <td>{{ $invoice->payment->created_at->format('d-m-y H:s a')}}</td>
                                   <td>
                                       <a href="{{ route('student.invoice.details',$invoice->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>
{{--                                       <a href="" class="btn btn-primary btn-sm"><i class="mdi mdi-download"></i></a>--}}
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
            </div>
        </div>
    </div>
@endsection
