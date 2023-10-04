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
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="mdi mdi-information"></i>
                                </span>
                                <input type="hidden" name="types[]" value="footer_about">
                                <textarea name="footer_about" rows="4" class="form-control" placeholder="Footer Information">{!! get_setting('footer_about') !!}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="mdi mdi-facebook"></i>
                                </span>
                                <input type="hidden" name="types[]" value="fb_url">
                                <input type="url" name="fb_url" class="form-control" placeholder="Facebook Url" value="{{ get_setting('fb_url') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="mdi mdi-instagram"></i>
                                </span>
                                <input type="hidden" name="types[]" value="insta_url">
                                <input type="url" name="insta_url" class="form-control" placeholder="Instagram Url" value="{{ get_setting('insta_url') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="mdi mdi-youtube"></i>
                                </span>
                                <input type="hidden" name="types[]" value="youtube_url">
                                <input type="url" name="youtube_url" class="form-control" placeholder="Youtube Url" value="{{ get_setting('youtube_url') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="mdi mdi-phone"></i>
                                </span>
                                <input type="hidden" name="types[]" value="footer_phone">
                                <input type="text" name="footer_phone" class="form-control" placeholder="Input Your Phone Number" value="{{ get_setting('footer_phone') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="mdi mdi-email"></i>
                                </span>
                                <input type="hidden" name="types[]" value="footer_email">
                                <input type="email" name="footer_email" class="form-control" placeholder="Input Your email address" value="{{ get_setting('footer_email') }}">
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </form>
        </div> <!-- end col -->
    </div>
@endsection
