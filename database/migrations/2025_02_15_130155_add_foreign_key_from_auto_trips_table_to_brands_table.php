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
            $table->foreign('car_brand_id', 'fk_auto_trips_car_brand_id_to_car_brands')->references('id')->on('car_brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auto_trips', function (Blueprint $table) {
            $table->dropForeign('fk_auto_trips_car_brand_id_to_car_brands');
        });
    }
};
