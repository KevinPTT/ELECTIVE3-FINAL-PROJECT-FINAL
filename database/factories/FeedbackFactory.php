<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10), // Random user ID between 1 to 10
            'journey_id' => $this->faker->numberBetween(1, 20), // Random journey ID between 1 to 20
            'rating' => $this->faker->numberBetween(1, 5), // Random rating between 1 to 5
            'comment' => $this->faker->paragraph(), // Random comment
            'date' => $this->faker->dateTimeBetween('-1 month', 'now'), // Random date within the past month and now
        ];
    }
}
