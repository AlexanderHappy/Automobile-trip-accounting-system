<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('auto_trips', function (Blueprint $table) {
            $table->foreignId('auto_trip_id')
                ->constrained('auto_trips_car_brand_car_model')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auto_trips', function (Blueprint $table) {
            $table->dropForeign('auto_trips_auto_trip_id_foreign');
            $table->dropColumn('auto_trip_id');
        });
    }
};
