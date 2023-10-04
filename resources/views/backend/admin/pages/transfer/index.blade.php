@extends('backend.admin.layouts.app')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-white border shadow text-center">
                    <div class="card-body">
                        <h1>{{ $title }}</h1>
                        <h5>Course Name : {{ $course->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card border shadow">
                    <div class="card-header text-white bg-dark">
                        <h3 class="header-title d-inline">{{ $title }} <span class="badge badge-success-lighten">{{$users->count()}}</span></h3>
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm float-end"><i class="mdi mdi-arrow-left"></i> Go Back</a>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table border border-dark table-bordered table-striped dt-responsive nowrap w-100 text-dark">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th class="text-center">Student Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                @can('Transfer.SpendTime')
                                    <th>Suspend Status</th>
                                @endcan
                                @can('Transfer.Community')
                                    <th>Community Post Status</th>
                                @endcan
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->user->name ?? '' }}</td>
                                    <td>{{ $student->user->phone ?? '' }}</td>
                                    <td>{{ $student->user->email ?? '' }}</td>
                                    @can('Transfer.SpendTime')
                                        <td>
                                            <input type="checkbox"
                                                   name="is_suspend"
                                                   {{ $student->is_suspend == true ? 'checked' : '' }}
                                                   value="true"
                                                   onclick="isSuspend({{ $student->user->id }})"
                                                   id="is-suspend-{{$student->user->id}}"
                                                   data-switch="secondary"/>
                                            <label for="is-suspend-{{$student->user->id}}" data-on-label="Yes" data-off-label="No"></label>
                                        </td>
                                    @endcan
                                    @can('Transfer.Community')
                                        <td>
                                            <input type="checkbox"
                                                   name="is_post_approval"
                                                   {{$student->is_post_approval ? 'checked' : ''}}
                                                   onclick="isPostApproval({{ $student->user->id }})"
                                                   value="true"
                                                   id="is-post-approval-{{$student->user->id}}"
                                                   data-switch="secondary"/>
                                            <label for="is-post-approval-{{$student->user->id}}" data-on-label="Yes" data-off-label="No"></label>
                                        </td>
                                    @endcan
                                    <td>
                                        @can("Transfer.Remove")
                                            <a href="{{ route('admin.transfer.remove',$student->user->id) }}" class="btn btn-danger btn-sm">Remove</a>
                                        @endcan
                                        @can('Transfer.Transfer')
                                            <a href="{{ route('admin.transfer.transfer',$student->user->id) }}" class="btn btn-danger btn-sm">Transfer</a>
                                        @endcan
                                        @can('Transfer.Email')
                                            <a href="{{ route('admin.transfer.email',$student->user->id) }}" class="btn btn-success btn-sm">Send Mail</a>
                                        @endcan
                                        @can('Transfer.Notification')
                                            <a href="{{ route('admin.transfer.notification',$student->user->id) }}" class="btn btn-dark btn-sm">Notification</a>
                                        @endcan
                                        @can('Transfer.Profile')
                                            <a href="{{ route('admin.transfer.profile',$student->user->id) }}" class="btn btn-primary btn-sm">Profile</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function isSuspend(id){
            $.post('{{ route('admin.transfer.suspend') }}' , {_id:id} , function (response) {
                $.NotificationApp.send("Success","Student Suspend Status Changed","top-right","green","Icon")
                console.log(response);
            });
        }

        function isPostApproval(id){
            $.post('{{ route('admin.transfer.community-post') }}' , {_id:id} , function (response) {
                $.NotificationApp.send("Success","Student Community Post Approval Status Changed","top-right","green","Icon")
                console.log(response);
            });
        }
    </script>
@endsection
