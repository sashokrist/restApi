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
    public function getFeedInfo(TestApiService $apiService)
    {
        $apiService->get();
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function showProduct()
    {
        return view('products', ['products' => DB::table('products')
            ->orderByDesc('id')
            ->paginate(10)]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function showOrder()
    {
        return view('orders', ['orders' => DB::table('orders')
            ->orderByDesc('id')
            ->paginate(10)]);
    }
}
