<?php

use App\Http\Controllers\ApiController;
use App\Services\TestApiService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//authenticate
Route::post('/api/v1/authenticate', [TestApiService::class, 'authenticate']);
//get random feed
Route::get('/api/v1/getFeedInfo', [ApiController::class, 'getFeedInfo'])->name('/api/v1/getFeedInfo');
Route::get('/api/v1/getRandomFeed', [ApiController::class, 'getRandomFeed'])->name('/api/v1/getRandomFeed');
Route::get('/api/v1/showFeeds', [ApiController::class, 'showFeeds'])->name('/api/v1/shoFeeds');

