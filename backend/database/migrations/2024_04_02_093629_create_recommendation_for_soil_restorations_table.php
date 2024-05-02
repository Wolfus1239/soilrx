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
        Schema::create('recommendation_for_soil_restorations', function (Blueprint $table) {
            $table->id();
            $table->string('names_of_cultures');

            $table->unsignedBigInteger('plots_id');
            $table->index('plots_id', 'recommendation_for_soil_restorations_plots_idx');
            $table->foreign('plots_id', 'recommendation_for_soil_restorations_plots_fk')->on('plots')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendation_for_soil_restorations');
    }
};
