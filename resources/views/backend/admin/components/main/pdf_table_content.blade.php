<tr>
    <td>#{{ $loop->iteration }}</td>
    <td>{{ Str::limit($pdf->title ?? '',20) }}</td>
    <td>
        <a href="{{ route('admin.pdf.show',$pdf->id ?? '') }}" class="btn btn-warning btn-sm">
            <i class="dripicons-view-list"></i>
        </a>
        <a href="{{ route('admin.pdf.edit',$pdf->id ?? '') }}" class="btn btn-warning btn-sm">
            <i class="dripicons-document-edit"></i>
        </a>
        <a href="{{ $pdf->pdf ? asset($pdf->pdf) : defPdf() }}" download class="btn btn-warning btn-sm">
            <i class="dripicons-download"></i>
        </a>
        <a href="Javascript:void(0);" onclick="event.preventDefault();document.getElementById('deleteForm{{$pdf->id ?? ''}}').submit();" class="btn btn-danger btn-sm">
            <i class="dripicons-trash"></i>
            <form action="{{ route('admin.pdf.destroy',$pdf->id ?? '') }}" method="post" id="deleteForm{{$pdf->id ?? ''}}">
                @csrf
                @method("DELETE")
            </form>
        </a>
    </td>
</tr>
