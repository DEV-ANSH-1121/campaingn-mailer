<x-mail::message>
Hi {{ $receiver }},
<br>

{!! html_entity_decode($campaign->mailTemplate->content) !!}

<br>
<img src="{{ url('/mark-mail-read?campaignId=' . $campaign->id . '&&userId=' . $user->id) }}" height="0" width="0">
<br>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
