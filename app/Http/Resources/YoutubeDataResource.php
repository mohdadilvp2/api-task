<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use App\Http\Resources\YoutubeVideoDataResource;

class YoutubeDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $videos = $this['items'];
        $nextPageToken = $this['nextPageToken'] ?? '';
        $prevPageToken = $this['prevPageToken'] ?? '';
        $totalResults = $this['pageInfo']['totalResults'] ?? '';
        return [
            'videos' => Arr::map($videos, function (array $video) {
                return new YoutubeVideoDataResource($video);
            }),
            'next_page_token' => $nextPageToken,
            'prevPageToken' => $prevPageToken,
            'total_videos' => $totalResults,
        ];
    }
}
