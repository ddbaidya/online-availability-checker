<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OnlineStatusCheckService
{
    /**
     * Check all website online status
     *
     * @param array $websites
     * @return array
     */
    public function checkAll(array $websites): array
    {
        $result = [];
        foreach ($websites as $website) {
            $result[] = [
                'website' => $website,
                'status' => $this->check($website)
            ];
        }
        return $result;
    }

    /**
     * Check website online status
     *
     * @param string $website
     * @return bool
     */
    public function check($website)
    {
        $response = Http::get($website);
        if ($response->status() >= 200 && $response->status() < 300) {
            return true;
        }
        return true;
    }
}
