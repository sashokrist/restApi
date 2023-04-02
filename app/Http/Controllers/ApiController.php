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
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    /**
     * @param TestApiService $apiService
     * @return void
     * @throws GuzzleException
     */
    public function getFeedInfo(TestApiService $apiService)
    {
        $apiService->get();
    }
    public function showFeeds()
    {
        $orders = DB::table('orders')->get();
        $products = DB::table('products')->get();

        return view('feeds', compact(['orders', 'products']));
    }

    /**
     * @param Request $request
     * @param TestApiService $apiService
     * @return \Illuminate\Http\RedirectResponse
     * @throws GuzzleException
     */
    public function getRandomFeed(Request $request, TestApiService $apiService)
    {
        $apiService->get();

        Session::flash('success', 'New random feed was generated.');

        return redirect()->back();
    }

}
