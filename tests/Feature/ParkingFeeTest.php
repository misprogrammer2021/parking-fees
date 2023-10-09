<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class ParkingFeeTest extends TestCase
{
    public function test_calculate_parking_fee_below_15_minutes_on_weekday(): void
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-25 08:27:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 0.00]);
    }

    public function test_calculate_parking_fee_below_15_minutes_on_weekend(): void
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-25 08:27:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 0.00]);
    }

    public function test_calculate_parking_fee_below_3_hours_on_weekday(): void
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-25 10:27:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 3.00]);
    }

    public function test_calculate_parking_fee_below_3_hours_on_weekend(): void
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-25 10:27:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 5.00]);
    }

    public function test_calculate_parking_fee_more_3_hours_on_weekday(): void
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-25 12:19:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 4.50]);
    }

    public function test_calculate_parking_fee_more_3_hours_on_weekend(): void
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-25 12:19:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 3.00]);
    }

    // public function testCalculateParkingFeeMore8hours()
    // {
    //     $startTime = '2021-10-25 08:16:00';
    //     $endTime = '2021-10-25 16:27:00';

    //     $response = $this->post('/api/calculate-parking-fee', [
    //         'start_time' => $startTime,
    //         'end_time' => $endTime,
    //     ]);

    //     $response->assertStatus(200)
    //         ->assertJson(['fee' => 10.50]);
    // }

    public function test_calculate_parking_fee_more_24_hours_on_weekday()
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-26 08:16:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 30.50]);
    }

    public function test_calculate_parking_fee_more_24_hours_on_weekend()
    {
        $startTime = '2021-10-25 08:16:00';
        $endTime = '2021-10-26 08:16:00';

        $response = $this->post('/api/calculate-parking-fee', [
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 52.50]);
    }
}

