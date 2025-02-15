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
            $table->foreignId('car_model_id')->constrained('car_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auto_trips', function (Blueprint $table) {
            $table->dropForeign('auto_trips_car_model_id_foreign');
            $table->dropColumn('car_model_id');
        });
    }
};
