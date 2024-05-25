<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJourneysTable extends Migration
{
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('destination');
            $table->dateTime('booking_date')->nullable();
            $table->dateTime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time('time')->default(DB::raw('CURRENT_TIME'));
            $table->string('vehicle_type');
            $table->decimal('price', 8, 2)->default(0);
            $table->integer('available_seats')->default(10);
            $table->enum('status', ['pending', 'scheduled', 'denied', 'processing'])->default('pending');
            $table->timestamps();

            // Add unique constraint to prevent duplicate bookings
            $table->unique(['booking_date', 'origin', 'destination']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('journeys');
    }
}
