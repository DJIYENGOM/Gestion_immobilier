<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // Dans la migration de la table 'biens'
        public function up()
        {
            Schema::create('biens', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->enum('nom', ['studio', 'duplex', 'appartement']);
                $table->enum('categorie', ['luxe', 'simple', 'moyen']);
                $table->string('image')->nullable();
                $table->text('description')->nullable(); // Assurez-vous que cette ligne est ajoutée
                $table->string('adresse')->nullable();
                $table->enum('status', ['occuper', 'disponible'])->nullable();
                $table->timestamp('date_enregistrement')->useCurrent();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
