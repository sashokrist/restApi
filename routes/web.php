<?php

use App\Http\Controllers\ApiController;
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
Route::post('/api/v1/authenticate', [\App\Services\TestApiService::class, 'authenticate']);
//get random feed
Route::get('/api/v1/getFeedInfo', [ApiController::class, 'getFeedInfo']);
Route::get('/api/v1/showProduct', [ApiController::class, 'showProduct'])->name('/api/v1/showProduct');
Route::get('/api/v1/showOrder', [ApiController::class, 'showOrder'])->name('/api/v1/showOrder');

