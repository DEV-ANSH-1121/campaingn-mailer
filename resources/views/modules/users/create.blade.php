@extends('layout.master')

@section('title','Create User')

@section('content')

<!-- Create User -->
<div class="row">
    <div class="col-12">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="card m-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <b class="card-title">Create User</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Create user with name and email -->

                        <div class="form-group input-group-sm mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group input-group-sm">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection
