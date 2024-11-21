<?php

namespace App\Http\Controllers;

use App\Models\BatteryMonitoring;
use App\Models\DistanceMonitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StatisticController extends Controller
{
    /**
     * Mengambil statistik percobaan terakhir
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatistics()
{
    try {
        $lastTrial = BatteryMonitoring::max('percobaan');

        $batteryData = BatteryMonitoring::where('percobaan', $lastTrial)->orderBy('timestamp')->get();
        $distanceData = DistanceMonitoring::where('percobaan', $lastTrial)->orderBy('timestamp')->get();

        // Gabungkan data berdasarkan timestamp terdekat
        $mergedData = $batteryData->map(function ($battery) use ($distanceData) {
            $closestDistance = $distanceData->sortBy(function ($distance) use ($battery) {
                return abs(strtotime($distance->timestamp) - strtotime($battery->timestamp));
            })->first();

            // Hanya masukkan jika timestamp terdekat dalam toleransi (misal 5 detik)
            if (abs(strtotime($closestDistance->timestamp ?? '1970-01-01') - strtotime($battery->timestamp)) <= 5) {
                return [
                    'percobaan' => $battery->percobaan,
                    'timestamp' => $battery->timestamp,
                    'battery_level' => $battery->battery_level,
                    'distance_covered' => $closestDistance->distance_covered ?? 0,
                ];
            }
        })->filter(); // Hapus nilai null yang tidak memiliki pasangan

        return response()->json(['trials' => $mergedData]);
    } catch (\Exception $e) {
        Log::error('Error fetching statistics: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}




}
