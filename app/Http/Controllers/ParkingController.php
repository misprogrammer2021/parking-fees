<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ParkingService;
use Carbon\Carbon;

class ParkingController extends Controller
{
    protected $parkingService;

    public function __construct(ParkingService $parkingService)
    {
        $this->parkingService = $parkingService;
    }

    public function calculateParkingFee(Request $request)
    {
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time'));

        $parkingFee = $this->parkingService->calculateParkingFee($startTime, $endTime);

        return response()->json(['fee' => $parkingFee]);
    }
}
