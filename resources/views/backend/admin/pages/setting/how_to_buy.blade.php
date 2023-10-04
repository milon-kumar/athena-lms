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
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#stepone" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Step One</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#steptwo" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Step Two</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#stepthree" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Step Three</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#stepfore" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Step Fore</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="stepone">
                                <div class="">
                                    <input type="hidden" name="types[]" value="step_one">
                                    <textarea name="step_one" id="" rows="3" class="form-control" placeholder="Step One Content">{!! get_setting('step_one') !!}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="steptwo">
                                <div class="">
                                    <input type="hidden" name="types[]" value="step_two">
                                    <textarea name="step_two" id="" rows="3" class="form-control" placeholder="Step Two Content">{!! get_setting('step_two') !!}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="stepthree">
                                <div class="">
                                    <input type="hidden" name="types[]" value="step_three">
                                    <textarea name="step_three" id="" rows="3" class="form-control" placeholder="Step Three Content">{!! get_setting('step_three') !!}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="stepfore">
                                <div class="">
                                    <input type="hidden" name="types[]" value="step_fore">
                                    <textarea name="step_fore" id="" rows="3" class="form-control" placeholder="Step Fore Content">{!! get_setting('step_fore') !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </form>
        </div> <!-- end col -->
    </div>
@endsection
