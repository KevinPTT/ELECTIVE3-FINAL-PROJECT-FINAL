<?php

namespace Database\Factories;

use App\Models\Journey;
use Illuminate\Database\Eloquent\Factories\Factory;

class JourneyFactory extends Factory
{
    protected $model = Journey::class;

    public function definition()
    {
        return [
            'origin' => $this->faker->city,
            'destination' => $this->faker->city,
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'vehicle_type' => $this->faker->randomElement(['bus', 'train', 'plane']),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'available_seats' => $this->faker->numberBetween(50, 200),
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
        ];
    }
}

