@extends('layout.master')

@section('title','Create Campaign')

@section('content')

<!-- Create campaign -->
<div class="row">
    <div class="col-12">
        <form action="{{ route('mailCampaigns.store') }}" method="post">
            @csrf
            <div class="card m-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <b class="card-title">Create Campaign</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Create campaign with name and email -->

                    <div class="form-group input-group-sm mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="subject" class="mb-1">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="{{ old('subject') }}">
                        @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="start_time" class="mb-1">Campaign Date</label>
                        <input type="text" class="form-control" id="start_time" name="start_time" placeholder="Select Campaign Date" value="{{ old('start_time') }}">
                        @error('start_time')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="mail_template_id" class="mb-1">Select Template</label>
                        <select class="form-select mail_template_id" id="mail_template_id" name="mail_template_id">
                            <option value="">Select Template</option>
                            @foreach ($templates as $template)
                            <option value="{{ $template->id }}" {{ old('mail_template_id') == $template->id ? 'selected' : ''}}>
                                {{ $template->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('mail_template_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group input-group-sm mb-3">
                        <label for="campaign_users" class="mb-1">Select Users</label>
                        <select class="form-select campaign_users" id="campaign_users" name="campaign_users[]" placeholder="Select Users" multiple>
                            <option class="all_options" value="_">Select All Users</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('campaign_users') == $user->id ? 'selected' : ''}}>
                                {{ $user->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('campaign_users')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary mr-3">Schedule Campaign</button>
                    <!-- <span class="btn btn-sm btn-warning mr-3">Schedule Campaign</span> -->
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('.mail_template_id').select2();

        $('.campaign_users').select2({
            placeholder: "Select Users For Campaign",
        });
        $('.campaign_users').on("select2:select", function (e) {
            let data = e.params.data.text;
            if(data=='Select All Users'){
                $(".campaign_users > option").prop("selected","selected");
                $(".campaign_users > option.all_options").prop("selected", false);
                $(".campaign_users").trigger("change");
            }
        });

        $('#start_time').datepicker({
            format: 'DD/MM/YYYY hh:mm A',
            defaultDate: new Date(),
            minDate: 0,
        });
    });
</script>
@endsection
