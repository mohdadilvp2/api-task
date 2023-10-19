<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ApiTest extends TestCase
{

    public function test_the_application_returns_a_successful_response(): void
    {
        $body = file_get_contents(base_path('tests/wikidata.json'));
        Http::fake([
            'https://en.wikipedia.org/w/api.php*' => Http::response($body, 200),
        ]);
        $body = file_get_contents(base_path('tests/youtubedata.json'));
        Http::fake([
            'https://www.googleapis.com/youtube/v3/videos*' => Http::response($body, 200),
        ]);
        $response = $this->get('/api/v1/get_country_data?country_code=gb&per_page=1');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_an_error_response_with_wiki_api_error(): void
    {
        Http::fake([
            'https://en.wikipedia.org/w/api.php*' => Http::response(['error' => 'Not Found'], 404),
        ]);
        $response = $this->get('/api/v1/get_country_data?country_code=gb&per_page=1');
        $response->assertStatus(500)->assertJson([
            'message' => 'Wiki api error'
        ]);
    }

    public function test_the_application_returns_an_error_response_with_youtube_api_error(): void
    {
        Http::fake([
            'https://www.googleapis.com/youtube/v3/videos*' => Http::response(['error' => 'Not Found'], 404),
        ]);
        $response = $this->get('/api/v1/get_country_data?country_code=gb&per_page=1');
        $response->assertStatus(500)->assertJson([
            'message' => 'Youtube api error'
        ]);
    }
}
