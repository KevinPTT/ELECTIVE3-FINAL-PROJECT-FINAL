<?php

namespace Database\Factories;

// database/factories/BookingFactory.php

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Journey;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 10), // Random user_id
            'journey_id' => rand(1, 20), // Random journey_id
            'passenger_name' => $this->faker->name,
            'seat_number' => $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['confirmed', 'pending', 'cancelled']),
            'booking_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
