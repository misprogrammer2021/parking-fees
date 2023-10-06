<?php

namespace App\Services;

/**
 * Class ParkingService.
 */
class ParkingService
{
    public function calculateParkingFee($hoursParked)
    {
        $baseFee = 5;
        $additionalHourFee = 2;

        if ($hoursParked <= 1) {
            return $baseFee;
        }

        return $baseFee + ($additionalHourFee * ($hoursParked - 1));
    }
}
