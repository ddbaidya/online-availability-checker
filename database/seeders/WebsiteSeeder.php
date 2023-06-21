<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Website::create([
            'url' => 'debdulal.com',
            'status' => true,
            'interval' => 1,
            'history' => 7
        ]);
        Website::create([
            'url' => 'vxvxcvxcv.com',
            'status' => true,
            'interval' => 1,
            'history' => 7
        ]);
    }
}
