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
        Schema::create('imagechambres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien_id');
            $table->float('dimensions_chambres');
            $table->json('image_path'); 
            $table->foreign('bien_id')->references('id')->on('biens')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagechambres');
    }
};
