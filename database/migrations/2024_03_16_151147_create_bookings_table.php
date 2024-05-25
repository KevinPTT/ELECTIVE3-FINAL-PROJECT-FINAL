<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreignId('journey_id')->constrained()->onDelete('cascade');
            $table->string('passenger_name')->default('Anonymous');
            $table->integer('seat_number')->default(1);
            $table->enum('status', ['confirmed', 'pending', 'cancelled'])->default('pending');
            $table->dateTime('booking_date')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
