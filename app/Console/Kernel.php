<?php

namespace App\Console;

use App\Jobs\CampaignMailJob;
use App\Models\MailCampaign;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $scheduledCampaigns = MailCampaign::where('status', 1)->where('start_time', date('m/d/Y'))->get();
        if ($scheduledCampaigns->count() > 0) {
            foreach ($scheduledCampaigns as $campaign) {
                $campaign->status = 2;
                $campaign->save();
                $schedule->job(new CampaignMailJob($campaign))->everyMinute();
            }
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
