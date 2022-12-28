<?php

use App\Http\Controllers\API\ShowBannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('showbanners')->group(function () {
//     Route::get('/', [ShowBannerController::class, 'index']);
//     Route::get('/{category}', [ShowBannerController::class, 'show']);
// });

Route::get('showbanners/{category?}', [ShowBannerController::class, 'index']);
