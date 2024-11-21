<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\StatisticController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/distance-monitoring', [MonitoringController::class, 'storeDistance']);
Route::post('/battery-monitoring', [MonitoringController::class, 'storeBattery']);
Route::post('/system-status', [MonitoringController::class, 'updateSystemStatus']);
Route::get('/system-status', [MonitoringController::class, 'getSystemStatus']);
Route::get('/monitoring-data', [MonitoringController::class, 'getMonitoringData']);
Route::get('/get-latest-trial', [MonitoringController::class, 'getLatestTrial']);

Route::get('/get-timestamp', function () {
    // Get current time in Jakarta timezone
    $timestamp = now()->format('Y-m-d H:i:s'); 
    return response()->json(['timestamp' => $timestamp]);
});

Route::get('/get-statistics', [StatisticController::class, 'getStatistics']);