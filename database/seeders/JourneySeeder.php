<?php

namespace Database\Seeders;
use App\Models\Journey;

use Illuminate\Database\Seeder;

class JourneySeeder extends Seeder
{
    public function run()
    {
        // Create 10 mock journeys using the JourneyFactory
        Journey::factory()->count(20)->create();
    }


}
