@extends('layout.master')

@section('title','Mail Log List')

@section('content')

<!-- Mail Log List -->
<div class="row">
    <div class="col-12">
        <div class="card m-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <b class="card-title">Mail Log List</b>
                    </div>
                    <div class="col-10">
                        <form action="{{ route('mailLogs.index') }}" method="GET">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="search" class="form-control" placeholder="Search Mail Log Here" aria-label="Search Mail Log Here" aria-describedby="basic-addon2" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                                    <a href="{{ route('mailLogs.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="user-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>@sortablelink('user.name', 'Receiver Name')</th>
                                <th>@sortablelink('mailCampaign.name', 'Campaign Name')</th>
                                <th>@sortablelink('mailCampaign.start_time', 'Start Time')</th>
                                <th>Mail Template</th>
                                <th>Status</th>
                                <th>@sortablelink('created_at', 'Created At')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mailLogs as $mailLog)
                            <tr>
                                <td>{{ $mailLog->user->name }}</td>
                                <td>{{ $mailLog->mailCampaign->name }}</td>
                                <td>{!! date('d M Y', strtotime($mailLog->mailCampaign->start_time)) !!}</td>
                                <td>{{ $mailLog->mailCampaign->mailTemplate->name }}</td>
                                <td>{{ $mailLog->status }}</td>
                                <td>{{ $mailLog->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        No Mail Log Yet
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $mailLogs->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>



@endsection
