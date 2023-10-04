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
                        <input type="hidden" name="types[]" value="drop_cv">
                        <textarea name="drop_cv" id="drop_cv" rows="20">{!! get_setting('drop_cv') !!}</textarea>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </form>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#drop_cv'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection