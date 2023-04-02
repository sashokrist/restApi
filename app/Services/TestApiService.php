<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;

class TestApiService
{
    private $apiUrl;
    private $clientId;
    private $clientSecret;
    private $accessToken;

    public function __construct()
    {
        $this->apiUrl = 'https://apptest.wearepentagon.com/devInterview/API/en';
        $this->clientId = 'devtask';
        $this->clientSecret = 'Ye97T%c!CGZ*7$52';
    }

    /**
     * Authenticates with the API and sets the access token
     *
     * @return string
     * @throws GuzzleException
     */
    public function authenticate(): string
    {
        $client = new Client();
        $response = $client->post("$this->apiUrl/access-token", [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        return $data['access_token'];
    }

    /**
     * @return void
     * @throws GuzzleException
     */
    public function get()
    {
        $this->accessToken = $this->authenticate();
        $client = new Client();
        $response = $client->get("$this->apiUrl/get-random-test-feed", [
            'headers' => [
                'Authorization' => "Bearer $this->accessToken",
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);

        [$type, $fields] = explode(':', $data);
        $fields = explode('||', $fields);

        if ($type === 'order') {
            Order::updateOrCreate(['type' => $type], ['data' => json_encode($fields)]);
        } elseif ($type === 'product') {
            Product::updateOrCreate(['type' => $type], ['data' => json_encode($fields)]);
        }
    }
}
