@extends('backend.admin.layouts.app')
@section('title','Setting')
@section('content')

    <div class="container-fluid">
        @include('backend.admin.components.page_header')
        <div class="row">
            <div class="col-sm-3 mb-sm-0">
                <div class="card border shadow">
                    <div class="card-header">
                        <h5>Setting Tabs</h5>
                    </div>
                    <div class="card-body">
                        @include('backend.admin.components.setting_tags')
                    </div>
                </div>
            </div>

            <div class="col-sm-9 card shadow border">
               @yield('setting_content')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('/')}}backend/assets/js/pages/demo.form-wizard.js"></script>
@endsection
