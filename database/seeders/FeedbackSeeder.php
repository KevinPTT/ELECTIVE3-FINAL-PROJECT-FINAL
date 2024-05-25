<?php

namespace Database\Seeders;
use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    public function run()
    {
        // Create 10 mock feedbacks using the FeedbackFactory
        Feedback::factory()->count(10)->create();
    }
}
