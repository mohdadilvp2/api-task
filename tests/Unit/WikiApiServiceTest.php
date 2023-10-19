<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Services\WikiApiService; // need to update

class WikiApiServiceTest extends TestCase
{
    /** @test */
    public function it_fetches_data_from_wiki_api()
    {
        $body = file_get_contents(base_path('tests/wikidata.json'));
        Http::fake([
            'https://en.wikipedia.org/w/api.php*' => Http::response($body, 200),
        ]);
        $wikiApiService = new WikiApiService();
        $data = $wikiApiService->getCountryDetails('United Kingdom');
        $this->assertEquals(json_decode($body, true), $data);
    }

    /** @test */
    public function it_handles_failed_api_request()
    {
        Http::fake([
            'https://en.wikipedia.org/w/api.php*' => Http::response(['error' => 'Not Found'], 404),
        ]);
        $wikiApiService = new WikiApiService();
        $data = $wikiApiService->getCountryDetails('United Kingdom');
        $this->assertNull($data);
    }
}
