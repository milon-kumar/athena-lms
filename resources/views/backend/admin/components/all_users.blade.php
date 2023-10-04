
@extends('backend.admin.layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="d-flex align-content-center justify-content-between">
                    <h2>Manage Users</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if($users->count())
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user?->id }}</td>
                                        <td>{{ $user?->name }}</td>
                                        <td>{{ $user?->type }}</td>
                                        <td>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="">
                            <label>User name</label>
                            <input type="text" name="user" placeholder="e.g enter user name..." class="form-control">
                        </div>
                        <div class="mt-1">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="e.g enter email..." class="form-control">
                        </div>
                        <div class="mt-1">
                            <label>Role</label>
                            <select name="role" id="" class="form-control form-select">
                                <option value="null" selected disabled>Select This User Role</option>
                                @foreach(all_roles() as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="e.g enter password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
