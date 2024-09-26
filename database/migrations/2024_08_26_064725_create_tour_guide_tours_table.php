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
        // Schema::create('tour_guide_tours', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('tour_guide_tour', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_guide_id');
            $table->unsignedBigInteger('tour_id');
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('tour_guide_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_guide_tours');
    }
};
