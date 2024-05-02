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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->float('size');

            $table->unsignedBigInteger('field_id');
            $table->index('field_id', 'plot_field_idx');
            $table->foreign('field_id', 'plot_field_fk')->on('fields')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('soil_type_id');
            $table->index('soil_type_id', 'plot_soil_type_idx');
            $table->foreign('soil_type_id', 'plot_soil_type_fk')->on('soil_types')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('culture_id');
            $table->index('culture_id', 'plot_culture_idx');
            $table->foreign('culture_id', 'plot_culture_fk')->on('cultures')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
