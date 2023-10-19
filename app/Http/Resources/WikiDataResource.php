<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
class WikiDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $pageData = Arr::first($this['query']['pages']);
        return [
            'title' => $pageData['title'] ??'',
            'description' => $pageData['extract'] ??''
        ];
    }
}
