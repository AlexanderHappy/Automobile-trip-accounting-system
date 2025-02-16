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
            $table->bigInteger('car_brand_id')->unsigned()->index();
            $table->foreign('car_brand_id', 'fk_auto_trips_car_brand_id_to_car_models')->references('car_brand_id')->on('car_models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auto_trips', function (Blueprint $table) {
            $table->dropForeign('fk_auto_trips_car_brand_id_to_car_models');
            $table->dropColumn('car_brand_id');
        });
    }
};
