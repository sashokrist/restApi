<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class TestApiService
{

    // Set private properties for API URL, client ID, client secret, and access token
    /**
     * @var string
     */
    private $apiUrl = 'https://apptest.wearepentagon.com/devInterview/API/en';

    /**
     * @var string
     */
    private $clientId = 'devtask';

    /**
     * @var string
     */
    private $clientSecret = 'Ye97T%c!CGZ*7$52';

    /**
     * @var
     */
    private $accessToken;

    /**
     * Method to authenticate with the API and set the access token
     *
     * @return mixed
     * @throws GuzzleException
     */
    public function authenticate()
    {
        $client = new Client();

        // Send a POST request to the API's access-token endpoint with the client ID and secret as form params
        $response = $client->post("$this->apiUrl/access-token", [
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ],
        ]);

        // Decode the response body into an associative array and store the access token
        $data = json_decode($response->getBody()->getContents(), true);
        return $this->accessToken = $data['access_token'];
    }

    /**
     * Method to retrieve a random test feed from the API and insert it into the appropriate table in the database
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application|void
     * @throws GuzzleException
     */
    public function get()
    {
        $client = new Client();

        // Send a GET request to the API's get-random-test-feed endpoint with the access token as an authorization header
        $response = $client->get("$this->apiUrl/get-random-test-feed", [
            'headers' => [
                'Authorization' => "Bearer $this->accessToken",
            ],
        ]);

        // Extract the feed type and fields from the response body
        $data = $response->getBody()->getContents();
        //split string into an array based on a specified delimiter.
        $feedInfo = explode(':', $data);
        $type = $feedInfo[0];
        $fields = explode('||', $feedInfo[1]);

        // Convert the fields into an array and insert into database table based on feed type
        $feedData = [];
        foreach ($fields as $field) {
            $parts = explode('\\', $field);
            $name = $parts[0];
            // $encoding = isset($parts[1]) ? $parts[1] : null;
            $encoding = $parts[1] ?? null;
            $value = substr($parts[2], 1, -1);
            $feedData[$name] = $value;
        }

        if ($type === 'order') {
            DB::table('orders')->insert($feedData);
            $orders = DB::table('orders')->get();
            return view('orders', ['orders' => $orders]);
        }

        if ($type === 'product') {
            DB::table('products')->insert($feedData);
            $products = DB::table('products')->get();
            return view('products', ['products' => $products]);
        }
    }
}
