<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\AuthController;
use App\HTTP\Controllers\ScrapeDataController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('soccerData',[ScrapeDataController::class, 'index']); // scraping testing api
Route::post('user/register',[AuthController::class, 'register']);
Route::post('user/login',[AuthController::class, 'login']);

Route::middleware('auth:api')->group(function() {
    Route::post('user/auth',[AuthController::class, 'checkifauthenticated']);
    Route::post('user/logout',[AuthController::class, 'logout']);
});