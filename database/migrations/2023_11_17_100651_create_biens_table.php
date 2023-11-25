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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nom')->nullable();
            $table->integer('categorie')->default(1);
            $table->string('image_biens'); 
            $table->text('description')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('status')->default(1);
            $table->float('surface');
            $table->integer('nombre_chambre')->default(0);
            $table->float('dimension_chambre');
            $table->integer('toillette')->default(1);
            $table->integer('balcons')->default(1);
            $table->integer('espace_vert')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
