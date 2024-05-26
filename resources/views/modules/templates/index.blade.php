@extends('layout.master')

@section('title','Templates List')

@section('content')

<!-- Template List -->
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <b class="card-title">Templates List</b>
                    </div>
                    <div class="col-8">
                        <form action="{{ route('mailTemplates.index') }}" method="GET">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="search" class="form-control" placeholder="Search Template Here" aria-label="Search User Here" aria-describedby="basic-addon2" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    <a href="{{ route('mailTemplates.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('mailTemplates.create') }}" class="btn btn-sm btn-primary">Create Template</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="user-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('subject', 'Subject')</th>
                                <th>@sortablelink('createdBy.name', 'Created By')</th>
                                <th>@sortablelink('created_at', 'Created At')</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mailTemplates as $mailTemplate)
                            <tr>
                                <td>{{ $mailTemplate->name }}</td>
                                <td>{{ $mailTemplate->subject ?? 'NA' }}</td>
                                <td>{{ $mailTemplate->createdBy->name }}</td>
                                <td>{{ $mailTemplate->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($mailTemplate->created_by == auth()->id())
                                    <a href="{{ route('mailTemplates.edit', $mailTemplate->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('mailTemplates.destroy', $mailTemplate->id) }}" method="POST" class="d-inline" onsubmit="confirmDelete(this, event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        No Template Yet
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $mailTemplates->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>



@endsection
