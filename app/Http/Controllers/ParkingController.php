<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Services\ParkingService;
use Carbon\Carbon;

class ParkingController extends Controller
{
    public function calculateParkingFee(Request $request)
    {
        $startTime = Carbon::parse($request->input('start_time'));
        $endTime = Carbon::parse($request->input('end_time'));

        $parkingDuration = $endTime->diffInHours($startTime);

        $parkingFee = $parkingDuration * 3; 

        return response()->json(['fee' => $parkingFee]);
    }
    // public function calculateFee(Carbon $entryTime, Carbon $exitTime)
    // {
    //     // Calculate the parking fee based on the entry and exit times and other logic.
    //     // You can use Carbon's methods to perform date and time calculations.

    //     // Example calculation:
    //     $hoursParked = $exitTime->diffInHours($entryTime);
    //     $fee = $hoursParked * 5.00; // Adjust the calculation based on your business rules.

    //     return $fee;
    // }

    // public function calculateParkingFee($in, $out)
    // {
    //     // $fee = 5.00 + (strtotime($out) - strtotime($in)) / 3600 * 2.50;
    //     $fee = 5.00 + Carbon::parse($out) - ($in) / 3600 * 2.50;
 
    //     return number_format($fee, 2);
    // }

    // public function calculateParkingFee(Request $request)
    // {
    //     // $regNo = $request->input('reg_no');
    //     $in = $request->input('in');
    //     $out = $request->input('out');
    //     // $amountToPaid = $request->input('amount_to_paid');

    //     $parkingFee = $this->calculateFee($in, $out);
    //     return response()->json(['parking_fee' => $parkingFee]);
    // }

    // public function calculateFee($hoursParked)
    // {
    //     $baseFee = 3;
    //     $additionalHourFee = 1.5;

    //     if ($hoursParked <= 1) {
    //         return $baseFee;
    //     }

    //     return $baseFee + ($additionalHourFee * ($hoursParked - 1));
    // }

    // private function calculateFee($in, $out)
    // {
    //     $in = strtotime($in);
    //     $out = strtotime($out);
        
    //     $duration = ceil(($in - $out) / 3600);
        
    //     $baseFee = 5; 
    //     $additionalFeePerHour = 2; 
        
    //     if ($duration <= 1) {
    //         return $baseFee;
    //     } else {
    //         return $baseFee + ($duration - 1) * $additionalFeePerHour;
    //     }
    // }
}
