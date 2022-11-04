<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\APIAuthController;

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

Route::controller(APIAuthController::class)->prefix('auth')->group(function () {
    Route::post('/login', 'login')->name('user-auth.login');
});

Route::middleware('auth:sanctum')->controller(APIAuthController::class)->prefix('auth')->group(function () {
    Route::post('/logout', 'logout')->name('user-auth.logout');
});
