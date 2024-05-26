@extends('layout.master')

@section('title','Campaign List')

@section('content')

<!-- Campaign List -->
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <b class="card-title">Campaign List</b>
                    </div>
                    <div class="col-8">
                        <form action="{{ route('mailCampaigns.index') }}" method="GET">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="search" class="form-control" placeholder="Search Campaign Here" aria-label="Search User Here" aria-describedby="basic-addon2" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    <a href="{{ route('mailCampaigns.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('mailCampaigns.create') }}" class="btn btn-sm btn-primary">Create Campaign</a>
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
                                <th>@sortablelink('start_time', 'Start Time')</th>
                                <th>@sortablelink('mailTemplate.name', 'Mail Template')</th>
                                <th>@sortablelink('created_at', 'Created At')</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mailCampaigns as $mailCampaign)
                            <tr>
                                <td>{{ $mailCampaign->name }}</td>
                                <td>{{ $mailCampaign->subject ?? 'NA' }}</td>
                                <td>{!! date('d M Y', strtotime($mailCampaign->start_time)) !!}</td>
                                <td>{{ $mailCampaign->mailTemplate->name }}</td>
                                <td>{{ $mailCampaign->created_at->diffForHumans() }}</td>
                                <td>
                                    @php($start_time = \Carbon\Carbon::parse($mailCampaign->start_time))
                                    <a href="{{ route('mailCampaigns.edit', $mailCampaign->id) }}" class="btn btn-sm btn-primary">{{ $start_time->isPast() ? 'Copy Campaign' : 'Edit' }}</a>
                                    <form action="{{ route('mailCampaigns.destroy', $mailCampaign->id) }}" method="POST" class="d-inline" @if(!$start_time->isPast()) onsubmit="confirmDelete(this, event)" @else onsubmit="cantDeleteSwal(event)" @endif>
                                        @csrf
                                        @method('DELETE')
                                        @if (!$start_time->isPast())
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        @else
                                        <button type="submit" class="btn btn-sm btn-danger disabled">Delete</button>
                                        <!-- info icon -->
                                        <i class="fas fa-info-circle ml-1" onclick="cantDeleteSwal(event)"></i>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        No Campaign Yet
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $mailCampaigns->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')

<script>
    function cantDeleteSwal(event){
        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: "Can't delete this campaign",
            text: 'Campaign has already started or completed in past!',
        });
    }
</script>
@endsection
