<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
// use App\Services\ParkingService;
use App\Http\Controllers\ParkingController;
use Carbon\Carbon;

class ParkingFeeTest extends TestCase
{
    public function testCalculateParkingFee()
    {
        $startTime = Carbon::now();
        $endTime = Carbon::now()->addHours(1.5); 
        $response = $this->postJson('/calculate-parking-fee', [
            'start_time' => $startTime->toDateTimeString(),
            'end_time' => $endTime->toDateTimeString(),
        ]);

        $response->assertStatus(200)
            ->assertJson(['fee' => 3]); 
    }

    // public function testCalculateParkingFee()
    // {
    //     // Arrange
    //     $calculator = new ParkingController();
    //     $entryTime = Carbon::parse('2023-10-06 08:00:00'); // Replace with your desired entry time
    //     $exitTime = Carbon::parse('2023-10-06 17:30:00'); // Replace with your desired exit time

    //     // Act
    //     $fee = $calculator->calculateFee($entryTime, $exitTime);

    //     // Assert
    //     // Replace the expectedFee with the expected parking fee for the given entry and exit times
    //     $expectedFee = 12.50; // Replace with your expected fee
    //     $this->assertEquals($expectedFee, $fee);
    // }

    // // Test case to calculate parking fee for one hour of parking.
    // public function testCalculateParkingFeeForOneHour()
    // {
    //     $start = Carbon::parse('2023-10-06 10:00:00');
    //     $end = Carbon::parse('2023-10-06 11:00:00');
    //     $carbonNow = Carbon::parse('2023-10-06 11:15:00'); // Simulate "now" for the test

    //     $fee = calculateParkingFee($start, $end, $carbonNow);

    //     $this->assertEquals(5.00, $fee); // Adjust the expected fee as per your pricing logic
    // }

    // public function testCalculateParkingFeePer1Hour()
    // {
    //     $parkingService = new ParkingService();
    //     $fee = $parkingService->calculateParkingFee(1);
    //     $in = Carbon::parse('2023-10-05 08:00:00');
    //     $out = Carbon::parse('2023-10-05 09:00:00');

    //     $fee = $parkingService($in, $out);

    //     $this->assertEquals(5.00, $fee);
    // }
    // public function testCalculateParkingFee()
    // {
    //     $controller = new ParkingController();
    //     $in = '2023-10-05 08:00:00';
    //     $out = '2023-10-05 14:30:00';

    //     $fee = $controller->calculateParkingFee($in, $out);

    //     $this->assertEquals(10.50, $fee);
    // }
    // public function testScenarioOne()
    // {
    //     $parkingService = new ParkingService();
    //     $fee = $parkingService->calculateParkingFee(1);
    //     $data = [
    //         'reg_no' => 'SU 123 K',
    //         'in' => '2021-10-25 08:16:00',
    //         'out' => '2021-10-25 08:27:00',
    //         'duration' => '11 minutes',
    //         'amount_to_paid' => '$0.00',
    //     ];

    //     $response = $this->post('/calculate-parking-fee', $data);
    //     $response->assertStatus(200);
    //     $response->assertSee('Amount to paid: $0.00');
    // }

    // public function testScenarioTwo()
    // {
    //     $parkingService = new ParkingService();
    //     $fee = $parkingService->calculateParkingFee(1);
    //     $data = [
    //         'reg_no' => 'SN 3453 G',
    //         'in' => '2021-10-25 08:16:00',
    //         'out' => '22021-10-25 12:19',
    //         'duration' => '4 hours 3 minutes',
    //         'amount_to_paid' => '$4.50',
    //     ];

    //     $response = $this->post('/calculate-parking-fee', $data);
    //     $response->assertStatus(200);
    //     $response->assertSee('Amount to paid: 4.50');
    // }
}

