<?php

namespace App\Services;
use Carbon\Carbon;
/**
 * Class ParkingService.
 */
class ParkingService
{
    
    public function calculateParkingFee($startTime, $endTime)
    {
       $weekDay = $this->weekdayParkingFee($startTime, $endTime);
       $weeKend = $this->weekendParkingFee($startTime, $endTime);

       $startDay = Carbon::parse($startTime)->isWeekday();

       if ($startDay)  {
            return $weekDay;
       } else {
            return $weeKend;
       } 
    }

    private function weekdayParkingFee($startTime, $endTime) {
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        $hoursParked = $end->diffInHours($start);
        $minutesParked = $end->diffInMinutes($start);
        $more24hoursParked = $start->floatDiffInDays($end);
        $subsequentHour = $hoursParked - 3;
        $additionalHour = ($subsequentHour * 1.50) + 3;
        $totalPrice = $additionalHour;
        $totalPriceMore24Hours = 20 + 3 + 7.50;

        if ($minutesParked <= 15) {
            return 0.00;
        } else if ($hoursParked > 3 && $hoursParked < 24)  {
            return $totalPrice;
        } else if ($more24hoursParked > 24) {
            return $totalPriceMore24Hours;
        } 
        else {
            return 3.0;
        }
    }

    private function weekendParkingFee($startTime, $endTime) {
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        $hoursParked = $end->diffInHours($start);
        $minutesParked = $end->diffInMinutes($start);
        $more24hoursParked = $start->floatDiffInDays($end);
        $subsequentHour = $hoursParked - 5.00;
        $additionalHour = ($subsequentHour * 2.00) + 5.00;
        $totalPrice = $additionalHour;
        $totalPriceMore24Hours = 40 + 5 + 7.50;

        if ($minutesParked <= 15) {
            return 0.00;
        } else if ($hoursParked > 3 && $hoursParked < 24) {
            return $totalPrice;
        } 
        else if ($more24hoursParked > 24) {
            return $totalPriceMore24Hours;
        } 
        else {
            return 5.00;
        }
    }
    
}
