<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerSupport;
use Database\Factories\CustomerSupportFactory;

class CustomerSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 5 mock customer support tickets using the CustomerSupportFactory
        CustomerSupport::factory()->count(5)->create();
    }
}
