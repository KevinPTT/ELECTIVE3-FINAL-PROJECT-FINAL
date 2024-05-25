<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use Database\Factories\BookingFactory;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Create 10 mock bookings using the BookingFactory
        Booking::factory()->count(10)->create();
    }
}
