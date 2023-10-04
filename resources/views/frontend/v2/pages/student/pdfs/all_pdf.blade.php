@extends('frontend.v2.pages.student.layout.student_layout')
@section('student_content')
    @if($pdfs->count() > 0)
        <div class="table-responsive border-0 overflow-y-hidden">
            <table class="table mb-0 text-nowrap table-centered table-hover">
                <thead class="table-light">
                <tr>
                    <th scope="col">
                        #SL
                    </th>
                    <th scope="col">
                        PDF FILE
                    </th>
                    <th scope="col">
                        STATUS
                    </th>
                    <th scope="col">
                        Download
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($pdfs as $pdf)
                    <tr>
                        <td>
                            <h3>{{ $loop->iteration }}</h3>
                        </td>
                        <td>
                            <a href="{{ route('student.pdf.show',$pdf->id) }}" class="text-inherit">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="{{ asset('/') }}frontend/images/default_pdf.png" alt="" class="img-4by3-lg rounded">
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1 text-primary-hover">
                                            {{ Str::limit($pdf->title,40) ?? '' }}
                                        </h4>
                                        <span class="text-muted"><i class="mdi mdi-clock-alert"></i> {{ $pdf->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>Live
                        </td>
                        <td>
                            <a href="{{ $pdf->pdf ? asset($pdf->pdf) : '' }}" download class="btn btn-primary btn-sm">
                                <i class="mdi mdi-cloud-download"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                {!! $pdfs->links() !!}
                </tfoot>
            </table>
        </div>
    @else
        <div class="row my-5">
            <div class="col-md-12">
                <h1 class="text-center">No Pdf Found</h1>
            </div>
        </div>
    @endif
@endsection

