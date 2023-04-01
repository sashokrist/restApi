<?php

namespace Tests\Feature;

use App\Services\TestApiService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;

class TestApiServiceTest extends TestCase
{
    private $apiUrl = 'https://apptest.wearepentagon.com/devInterview/API/en';
    private $clientId = 'devtask';
    private $clientSecret = 'Ye97T%c!CGZ*7$52';
    private $accessToken;

    public function testAuthenticate()
    {
        $client = new Client();
        $response = $client->post("$this->apiUrl/access-token", [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('access_token', $data);
        $this->assertNotEmpty($data['access_token']);

        $this->accessToken = $data['access_token'];
    }

    /**
     * @throws GuzzleException
     */
    public function testGet(TestApiService $apiService)
    {
        $apiService->authenticate();
        $client = new Client();
        $response = $client->get("$this->apiUrl/get-random-test-feed", [
            'headers' => [
                'Authorization' => "Bearer $this->accessToken",
            ],
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('feed', $data);
        $this->assertNotEmpty($data['feed']);

        $feedInfo = explode(':', $data['feed']);
        $type = $feedInfo[0];
        $fields = explode('||', $feedInfo[1]);

        if ($type === 'order') {
            DB::table('orders')->insert($fields);
            $this->assertTrue(true);
        } else if ($type === 'product') {
            DB::table('products')->insert($fields);
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false, "Unknown feed type: $type");
        }
    }
}
