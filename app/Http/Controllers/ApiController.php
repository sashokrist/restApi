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
    public function showProduct()
    {
        return view('products', ['products' => DB::table('products')->get()]);
    }
    public function showOrder()
    {
        return view('orders', ['orders' => DB::table('orders')->get()]);
    }

    public function getRandomFeed(Request $request, TestApiService $apiService)
    {
        $apiService->get();

        Session::flash('success', 'New random feed was generated.');

        return redirect()->back();
    }

}
