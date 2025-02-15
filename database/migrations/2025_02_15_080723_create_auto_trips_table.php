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
        Schema::create('auto_trips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brand_id')->unsigned()->index();
            $table->bigInteger('model_id')->unsigned()->index();
            $table->bigInteger('mileage')->unsigned();
            $table->bigInteger('consumption')->unsigned();
            $table->bigInteger('bulk')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_trips');
    }
};
