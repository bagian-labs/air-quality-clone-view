<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginPagesController;
use App\Http\Controllers\PenjelasanAplikasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogDataPagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginPagesController::class, 'index'])->name('login');

Route::get('/air-quality', [DashboardController::class, 'getAirQuality'])->name('airQualityResult');
Route::post('/calculateAirQuality', [DashboardController::class, 'calculateAirQuality'])->name('calculateAirQuality');

Route::get('/penjelasan-aplikasi', [PenjelasanAplikasiController::class, 'index'])->name('penjelasan-aplikasi');

Route::get('/login-pages', [LoginPagesController::class, 'index'])->name('login-pages');

Route::get('/location', [DashboardController::class, 'getLocation'])->name('getLocation');
Route::get('/time', [DashboardController::class, 'getTime'])->name('getTime');
Route::get('/logdata-maps', [LogDataPagesController::class, 'index'])->name('logdata-maps');

Route::post('/logout', [LoginPagesController::class, 'logout'])->name('logout');
Route::post('/email/login', [LoginPagesController::class, 'emailLogin'])->name('email-login');
Route::post('/email/register', [RegisterController::class, 'registerEmail'])->name('email-register');
Route::post('/google/login', [LoginPagesController::class, 'googleLogin'])->name('google-login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [LoginPagesController::class, 'dashboard'])->name('dashboard');
});
