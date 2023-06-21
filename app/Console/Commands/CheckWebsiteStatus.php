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
        $websites = Website::pluck('url')->toArray();
        $results = [];

        foreach ($onlineStatusChecker->checkAll($websites) as $result) {
            $results[] = [
                'url' => $result['website'],
                'status' => $result['status'],
                'check_time' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        WebsiteStatusResult::insert($results);
    }
}
