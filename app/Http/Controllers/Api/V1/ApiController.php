<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use App\Services\WikiApiService;
use App\Services\YoutubeApiService;
use App\Http\Resources\WikiDataResource;
use App\Http\Resources\YoutubeDataResource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiController extends Controller
{
    public function getCountryData(ApiRequest $request, WikiApiService $wikiApiService, YoutubeApiService $youtubeApiService)
    {
        $supportedCountries = config('constants.supported_countries');
        $countryCode = $request->get('country_code');
        $perPage = $request->get('per_page');
        $countryName = $supportedCountries[$countryCode] ?? '';

        $wikiData = Cache::remember('wiki1' . $countryName, 1 /*update*/, function () use ($wikiApiService, $countryName) {
            return $wikiApiService->getCountryDetails($countryName);
        });
        if (!$wikiData) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Wiki api error',
            ], 500));
        }
        $wikiData = new WikiDataResource($wikiData);

        $youtubeData = Cache::remember('ytvideos_' . $countryName, 1 /*update*/, function () use ($youtubeApiService, $countryCode, $perPage) {
            return $youtubeApiService->getMostPopularVideos($countryCode, $perPage);
        });
        if (!$youtubeData) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Youtube api error',
            ], 500));
        }
        $youtubeData = new YoutubeDataResource($youtubeData);

        return response()->json([
            'success'   => true,
            'data'      => [
                'wiki' => $wikiData,
                'videos' => $youtubeData
            ]
        ], 200);
    }
}
