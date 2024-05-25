<?php

namespace Database\Factories;

use App\Models\CustomerSupport;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerSupportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerSupport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10), // Random user ID between 1 to 10
            'issue' => $this->faker->sentence(), // Random issue description
            'description' => $this->faker->paragraph(), // Random detailed description
            'date_opened' => $this->faker->dateTimeBetween('-1 month', 'now'), // Random date opened within the past month and now
            'date_resolved' => null, // Default to null for date resolved
        ];
    }
}
