@extends('backend.admin.pages.setting.all_setting')
@section('setting_title','Basic Setting')
@section('setting_content')
    <div class="row">
        <div class="col-md-12">
            <form class="card" action="{{ route('admin.setting.web-controls') }}" method="post">
                @csrf
                <div class="card-header">
                    <h4>Website Controls</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center gap-5 mb-3">
                        <input type="hidden" name="types[]" value="page_loader">
                        <input type="checkbox" id="page_loader" name="page_loader" value="1" {{ get_setting('page_loader') ? 'checked' : '' }} data-switch="success"/>
                        <label for="page_loader" data-on-label="Yes" data-off-label="No"></label>
                        <a href="Javascript:void(0);">
                            <label for="page_loader" class="fw-bolder handle" style="cursor: pointer;">Active Or Inactive Page Loader Check The Button
                                <span class="mark text-danger">Yes</span>
                            </label>
                            <b> - ( Use For Hide Page Loader)</b>
                        </a>
                    </div>

                    <div class="d-flex align-items-center gap-5 mb-3">
                        <input type="hidden" name="types[]" value="website_context_menu">
                        <input type="checkbox" id="website_context_menu" name="website_context_menu" value="1" {{ get_setting('website_context_menu') ? 'checked' : '' }} data-switch="success"/>
                        <label for="website_context_menu" data-on-label="Yes" data-off-label="No"></label>
                        <a href="Javascript:void(0);">
                            <label for="website_context_menu" class="fw-bolder handle" style="cursor: pointer;">If Your Hide Context Menu Then Check The Button
                                <span class="mark text-danger">Yes</span>
                            </label>
                            <b> - ( Use For Hide Context Menu)</b>
                        </a>
                    </div>

                    <div class="d-flex align-items-center gap-5 mb-3">
                        <input type="hidden" name="types[]" value="website_content_copy">
                        <input type="checkbox" id="website_content_copy" name="website_content_copy" value="1" {{ get_setting('website_content_copy') ? 'checked' : '' }} data-switch="success"/>
                        <label for="website_content_copy" data-on-label="Yes" data-off-label="No"></label>
                        <a href="Javascript:void(0);">
                            <label for="website_content_copy" class="fw-bolder handle" style="cursor: pointer;">If Your Hide website content copy Then Check The Button
                                <span class="mark text-danger">Yes</span>
                            </label>
                            <b> - ( Use For Select Website Content)</b>
                        </a>
                    </div>

{{--                    <div class="d-flex align-items-center gap-5 mb-3">--}}
{{--                        <input type="hidden" name="types[]" value="slider_arrow">--}}
{{--                        <input type="checkbox" id="slider_arrow" name="slider_arrow" value="1" {{ get_setting('slider_arrow') ? 'checked' : '' }} data-switch="success"/>--}}
{{--                        <label for="slider_arrow" data-on-label="Yes" data-off-label="No"></label>--}}
{{--                        <a href="Javascript:void(0);">--}}
{{--                            <label for="slider_arrow" class="fw-bolder handle" style="cursor: pointer;">Slider Arrow Active Or Inactive Then Check The Button--}}
{{--                                <span class="mark text-danger">Yes</span>--}}
{{--                            </label>--}}
{{--                            <b> - ( Use For Slider Arrow &leftarrow; &rightarrow;)</b>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark float-end">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
