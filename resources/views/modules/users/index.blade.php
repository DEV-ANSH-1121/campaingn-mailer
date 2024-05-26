@extends('layout.master')

@section('title','User List')

@section('content')

<!-- User List -->
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <b class="card-title">User List</b>
                    </div>
                    <div class="col-8">
                        <form action="{{ route('users.index') }}" method="GET">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="search" class="form-control" placeholder="Search User Here" aria-label="Search User Here" aria-describedby="basic-addon2" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add User</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="user-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('email', 'Email')</th>
                                <th>@sortablelink('created_at', 'Registered At')</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(this, event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>



@endsection
