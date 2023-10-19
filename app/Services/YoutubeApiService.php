<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YoutubeApiService
{
    protected $apiBaseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.yt.endpoint');
        $this->apiKey = config('services.yt.key');
    }

    public function getMostPopularVideos(string $regionCode, int $maxResults = 50, ?string $pageToken = null): ?array
    {
        return $this->getData('videos', array_merge([
            'part' => 'snippet',
            'chart' => 'mostPopular',
            'maxResults' => $maxResults,
            'fields' => 'items(id,snippet(title,description,thumbnails(high(url),default(url)))),nextPageToken,prevPageToken,pageInfo',
            'regionCode' => $regionCode,
        ], $pageToken !== null ? ['pageToken' => $pageToken] : []));
    }

    private function getData(string $endpoint, array $getParams): ?array
    {
        $getParamsWithKey =  array_merge($getParams, ['key' => $this->apiKey,]);
        try {
            $response = Http::get(
                $this->apiBaseUrl . $endpoint,
                $getParamsWithKey
            );
            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('YT api call unsuccessful', ['response' => $response->getBody()->getContents(), 'params' => $getParams]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('YT api call thowing error', ['exception' => $e, 'params' => $getParams]);
            return null;
        }
    }
}
