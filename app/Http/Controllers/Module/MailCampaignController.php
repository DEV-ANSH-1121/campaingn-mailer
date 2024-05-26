<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Campaigns\StoreRequest;
use App\Http\Requests\Modules\Campaigns\UpdateRequest;
use App\Jobs\CampaignMailJob;
use App\Mail\CampaignMail;
use App\Models\MailCampaign;
use App\Models\MailLog;
use App\Models\MailTemplate;
use App\Models\User;
use Illuminate\Http\Request;

class MailCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = $request->paginate ?? 10;
        $mailCampaigns = MailCampaign::sortable()->filter($request->all())
            ->paginate($paginate);
        return view('modules.campaigns.index', compact('mailCampaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = MailTemplate::filter()->get();
        $users = User::filter()->get();
        return view('modules.campaigns.create', compact('templates','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->getData();

        $campaignUsers = $data['campaign_users'];
        unset($data['campaign_users']);

        $campaign = MailCampaign::create($data);

        $campaign->campaignUsers()->attach($campaignUsers, ['created_by' => auth()->id()]);

        return to_route('mailCampaigns.index')
            ->with('success', 'Mail campaign created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MailCampaign $mailCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailCampaign $mailCampaign)
    {
        $templates = MailTemplate::filter()->get();
        $users = User::filter()->get();
        return view('modules.campaigns.edit', compact('mailCampaign', 'templates','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, MailCampaign $mailCampaign)
    {
        $data = $request->validated();

        $campaignUsers = $data['campaign_users'];
        unset($data['campaign_users']);

        $mailCampaign->update($data);
        $mailCampaign->campaignUsers()->sync($campaignUsers);

        return to_route('mailCampaigns.index')
            ->with('success', 'Mail campaign updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailCampaign $mailCampaign)
    {
        $mailCampaign->delete();
        return to_route('mailCampaigns.index')
            ->with('success', 'Mail campaign deleted successfully.');
    }

    // markMailRead
    public function markMailRead(Request $request)
    {
        if(isset($request->campaignId) && isset($request->userId)){
            MailLog::where('mail_campaign_id', $request->campaignId)
            ->where('user_id', $request->userId)
            ->update(['status' => 2]);
        }
        return null;
    }
}
