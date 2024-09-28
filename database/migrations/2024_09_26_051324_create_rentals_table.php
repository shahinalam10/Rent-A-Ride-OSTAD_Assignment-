<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id(); // Unique identifier for each booking
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the users table
            $table->foreignId('car_id')->constrained()->onDelete('cascade');  // Foreign key to the cars table
            $table->date('start_date'); // Rental start date
            $table->date('end_date');   // Rental end date
            $table->timestamps(); // For created_at and updated_at timestamps
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
