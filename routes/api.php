<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return 'hello world';
});

Route::post('/temperature', [Controller::class, 'storeTemp']);
Route::get('/users', [UserController::class, 'getAllUsers']);
Route::post('/users', [UserController::class, 'storeUsers']);
Route::get('/air-quality', [DashboardController::class, 'getAirQuality']);
Route::post('/calculate', [DashboardController::class, 'calculateAirQuality']);
Route::get('/location', [DashboardController::class, 'getLocation']);
Route::post('/location/store', [DashboardController::class, 'setLocation']);
Route::get('/time', [DashboardController::class, 'getTime']);
Route::get('/log', [DashboardController::class, 'getLog']);
