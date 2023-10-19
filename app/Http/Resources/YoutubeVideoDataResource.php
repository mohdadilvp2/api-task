<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class YoutubeVideoDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'title' => $this['snippet']['title'],
                'description' => $this['snippet']['description'],
                'thumbnails' => [
                    'default' => $this['snippet']['thumbnails']['default'],
                    'high' => $this['snippet']['thumbnails']['high'],
                ]
            ];
    }
}
