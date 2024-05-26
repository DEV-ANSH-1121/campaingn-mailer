@extends('layout.master')

@section('title','Edit User')

@section('content')

<!-- Edit User -->
<div class="row">
    <div class="col-12">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card m-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <b class="card-title">Edit User</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Edit user with name and email -->

                        <div class="form-group input-group-sm mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') ?? $user->name }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group input-group-sm">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') ?? $user->email }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
