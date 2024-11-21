<?php

namespace App\Http\Controllers;

use App\Events\MonitoringDataUpdated;
use Illuminate\Http\Request;
use App\Models\DistanceMonitoring;
use App\Models\BatteryMonitoring;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MonitoringController extends Controller
{
    /**
     * Simpan data jarak.
     */
    public function storeDistance(Request $request)
    {
        try {
            $data = $request->validate([
                'project_id' => 'required|integer',
                'distance_covered' => 'required|numeric',
                'timestamp' => 'required|date_format:Y-m-d H:i:s',
                'percobaan' => 'required|integer',
            ]);

            DistanceMonitoring::create($data);

            event(new MonitoringDataUpdated('distance', $data));

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error storing distance data: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Simpan data baterai.
     */
    public function storeBattery(Request $request)
    {
        try {
            $data = $request->validate([
                'project_id' => 'required|integer',
                'battery_level' => 'required|integer|min:0|max:100',
                'timestamp' => 'required|date_format:Y-m-d H:i:s',
                'percobaan' => 'required|integer',
            ]);

            BatteryMonitoring::create($data);

            event(new MonitoringDataUpdated('battery', $data));

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error storing battery data: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Ambil data monitoring terbaru.
     */
    public function getLatestData()
    {
        try {
            $isGenerating = Cache::get('is_generating', false);

            $latestBattery = BatteryMonitoring::latest('timestamp')->first();
            $latestDistance = DistanceMonitoring::latest('timestamp')->first();

            return response()->json([
                'is_generating' => $isGenerating,
                'battery_level' => $latestBattery->battery_level ?? 0,
                'distance_covered' => $latestDistance->distance_covered ?? 0,
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting monitoring data: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Ambil data percobaan terakhir.
     */
    public function getLatestTrial()
    {
        try {
            $latestTrial = max(
                DistanceMonitoring::max('percobaan') ?? 0,
                BatteryMonitoring::max('percobaan') ?? 0
            );

            return response()->json(['latest_trial' => $latestTrial]);
        } catch (\Exception $e) {
            Log::error('Error getting latest trial count: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Ambil timestamp server (Asia/Jakarta).
     */
    public function getTimestamp()
    {
        try {
            $timestamp = now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');

            return response()->json(['timestamp' => $timestamp]);
        } catch (\Exception $e) {
            Log::error('Error fetching timestamp: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Perbarui status sistem (is_generating).
     */
    public function updateSystemStatus(Request $request)
    {
        try {
            $isGenerating = $request->input('is_generating', false);

            Cache::put('is_generating', $isGenerating, now()->addMinutes(10));

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error updating system status: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Ambil status sistem (is_generating).
     */
    public function getSystemStatus()
    {
        try {
            $isGenerating = Cache::get('is_generating', false);

            return response()->json(['is_generating' => $isGenerating]);
        } catch (\Exception $e) {
            Log::error('Error fetching system status: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
