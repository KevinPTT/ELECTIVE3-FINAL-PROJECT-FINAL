<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_supports', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id'); // Foreign key column for user who opened the ticket
            $table->string('issue'); // Column for the issue or problem description
            $table->text('description'); // Column for detailed description of the issue
            $table->dateTime('date_opened'); // Column for the date when the ticket was opened
            $table->dateTime('date_resolved')->nullable(); // Column for the date when the ticket was resolved (nullable)

            $table->timestamps(); // Automatically adds created_at and updated_at columns

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_supports');
    }
}
