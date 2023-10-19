<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WikiApiService
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.wiki.endpoint');
    }

    public function getCountryDetails(string $country)
    {
        return $this->getData( [
            'action' => 'query',
            'prop' => 'extracts',
            'format' => 'json',
            'exintro' => true,
            'titles' => $country
        ]);
    }

    private function getData(array $getParams){
        try {
            $response = Http::get(
                $this->apiBaseUrl,
                $getParams
            );
            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Wik api call unsuccessful', ['response' => $response->getBody()->getContents(), 'params' => $getParams]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Wik api call thowing error', ['exception' => $e, 'params' => $getParams]);
            return null;
        }
    }
}
