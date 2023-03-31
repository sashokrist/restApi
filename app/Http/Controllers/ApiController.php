<?php

namespace App\Http\Controllers;

use App\Services\TestApiService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    /**
     * @param TestApiService $apiService
     * @return void
     * @throws GuzzleException
     */
    public function authenticate(TestApiService $apiService)
    {
        $apiService->authenticate();
    }

    /**
     * @param TestApiService $apiService
     * @return void
     * @throws GuzzleException
     */
    public function getFeedInfo(TestApiService $apiService)
    {
        $apiService->get();
    }
}
