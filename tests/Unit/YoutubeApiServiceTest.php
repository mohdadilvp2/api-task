<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Services\YoutubeApiService; // need to update

class YoutubeApiServiceTest extends TestCase
{
    /** @test */
    public function it_fetches_data_from_youtube_api()
    {
        $body = file_get_contents(base_path('tests/youtubedata.json'));
        Http::fake([
            'https://www.googleapis.com/youtube/v3/videos*' => Http::response($body, 200),
        ]);
        $yutubeApiService = new YoutubeApiService();
        $data = $yutubeApiService->getMostPopularVideos('uk');
        $this->assertEquals(json_decode($body, true), $data);
    }

    /** @test */
    public function it_handles_failed_api_request()
    {
        Http::fake([
            'https://www.googleapis.com/youtube/v3/videos*' => Http::response(['error' => 'Not Found'], 404),
        ]);
        $yutubeApiService = new YoutubeApiService();
        $data = $yutubeApiService->getMostPopularVideos('uk');
        $this->assertNull($data);
    }
}
