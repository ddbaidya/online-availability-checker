<?php

namespace App\Console\Commands;

use App\Models\Website;
use App\Models\WebsiteStatusResult;
use App\Services\OnlineStatusCheckService;
use Illuminate\Console\Command;

class CheckWebsiteStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'online:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $onlineStatusChecker = new OnlineStatusCheckService();
        $websites = Website::get()->toArray();
        $results = [];

        $website_update_online = [];
        foreach ($websites as $website) {
            // Website Result table records
            $online_status = $onlineStatusChecker->check($website['url']);
            $results[] = [
                'url' => $website['url'],
                'website_id' => $website['id'],
                'status' => $online_status,
                'check_time' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];

            // Websites table records
            $website_update_online[] = [
                'id' => $website['id'],
                'url' => $website['url'],
                'online_status' => $online_status,
                'last_update' => now(),
                'last_offline' => !$online_status ? now() : $website['last_offline']
            ];
        }
        WebsiteStatusResult::insert($results);
        Website::upsert($website_update_online, 'id');
    }
}
