<?php

namespace App\Jobs;

use App\Mail\CampaignMail;
use App\Models\MailCampaign;
use App\Models\MailLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CampaignMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $campaign;

    /**
     * Create a new job instance.
     */
    public function __construct(MailCampaign $mailCampaign)
    {
        $this->campaign = $mailCampaign;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail each campaignUsers()
        foreach ($this->campaign->campaignUsers as $campaignUser) {
            if(Mail::to($campaignUser)->send(new CampaignMail($this->campaign, $campaignUser))){
                MailLog::where('mail_campaign_id', $this->campaign->id)
                    ->where('user_id', $campaignUser->id)
                    ->update(['status' => 1]);
            } else {
                MailLog::where('mail_campaign_id', $this->campaign->id)
                    ->where('user_id', $campaignUser->id)
                    ->update(['status' => 3]);
            }
        }
        $this->campaign->update(['status' => 3]);
    }
}
