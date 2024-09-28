<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('rentals', function (Blueprint $table) {
        $table->enum('status', ['Ongoing', 'Completed', 'Canceled'])->default('Ongoing')->after('end_date'); // Add the status column first
        $table->decimal('total_cost', 10, 2)->nullable()->after('status'); // Then add the total_cost column after status
    });
}
    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('rentals', function (Blueprint $table) {
        $table->dropColumn('total_cost');
        $table->dropColumn('status');
    });
}
};
