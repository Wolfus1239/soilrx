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
        Schema::create('chemical_analysis_resaults', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plots_id');
            $table->index('plots_id', 'chemical_analysis_resault_plots_idx');
            $table->foreign('plots_id', 'chemical_analysis_resault_plots_fk')->on('plots')->references('id')->onDelete('cascade');

            $table->string('potassium_oxide');
            $table->string('nitric_oxide');
            $table->string('phosphorus_oxide');
            $table->string('pH');
            $table->string('pdf_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chemical_analysis_resaults');
    }
};
