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
use Illuminate\Http\JsonResponse;
use App\Http\Constants\ErrorCodes;

class ApiController extends Controller
{
    public function getCountryData(ApiRequest $request, WikiApiService $wikiApiService, YoutubeApiService $youtubeApiService)
    {
        $supportedCountries = config('constants.supported_countries');
        $countryCode = $request->get('country_code');
        $perPage = $request->get('per_page');
        $pageToken = $request->get('page_token') ?? null;
        $countryName = $supportedCountries[$countryCode] ?? '';

        // Cache the result for one day
        $wikiData = Cache::remember('wiki' . $countryName, 60 * 60 * 24, function () use ($wikiApiService, $countryName) {
            return $wikiApiService->getCountryDetails($countryName);
        });
        if (!$wikiData) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'error_code' => ErrorCodes::WIKI_API_ERROR,
                'message'   => trans('error_messages.' . ErrorCodes::WIKI_API_ERROR),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR));
        }
        $wikiData = new WikiDataResource($wikiData);

        // Cache the result for one hour
        $youtubeData = Cache::remember('ytvideos_' . $countryCode . '_' . $perPage . "_" . $pageToken, 60 * 60, function () use ($youtubeApiService, $countryCode, $perPage, $pageToken) {
            return $youtubeApiService->getMostPopularVideos($countryCode, $perPage, $pageToken);
        });
        if (!$youtubeData) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'error_code' => ErrorCodes::YT_API_ERROR,
                'message'   => trans('error_messages.' . ErrorCodes::YT_API_ERROR),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR));
        }
        $youtubeData = new YoutubeDataResource($youtubeData);

        return response()->json([
            'success'   => true,
            'data'      => [
                'wiki' => $wikiData,
                'yt_data' => $youtubeData
            ]
        ], JsonResponse::HTTP_OK);
    }
}
