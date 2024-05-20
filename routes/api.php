<?php

use App\Http\Controllers\api\AuthTokensController;
use App\Http\Controllers\api\statusController;
use App\Http\Controllers\api\VisitorController;
use App\Http\Controllers\ApiController;
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

Route::apiResource('visitormail', (VisitorController::class));

Route::get('/status/getmainsystem', [statusController::class,'getmainsystem']);
Route::get('/status/getsystemname/{id}', [statusController::class,'getsystemname']);

Route::apiResource('status', (statusController::class))->middleware(['auth:sanctum']);

Route::apiResource('auth/tokens', (AuthTokensController::class));

Route::get('/t/{id}', [ApiController::class, 'getdata'])->name('api.data.index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

