@extends('backend.admin.pages.setting.all_setting')
@section('setting_title',$title)
@section('setting_content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="{{ route('admin.setting.update') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-inline-block">Your content</h3>
                        <button class="btn btn-dark float-end" type="submit">Update Now</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="">Invoice Content One</label>
                            <input type="hidden" name="types[]" value="invoice_content_one">
                            <textarea name="invoice_content_one" class="form-control" id="invoice_content_one" rows="7">{!! get_setting('invoice_content_one') !!}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="">Invoice Content Two</label>
                            <input type="hidden" name="types[]" value="invoice_content_two">
                            <textarea name="invoice_content_two" class="form-control" id="invoice_content_two" rows="7">{!! get_setting('invoice_content_two') !!}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="">Invoice Footer Content</label>
                            <input type="hidden" name="types[]" value="invoice_footer_content">
                            <textarea name="invoice_footer_content" class="form-control" id="invoice_footer_content" rows="7">{!! get_setting('invoice_footer_content') !!}</textarea>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </form>
        </div> <!-- end col -->
    </div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#invoice_footer_content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
