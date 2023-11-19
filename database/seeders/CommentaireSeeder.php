<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commentaire;

class CommentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Utilisez la factory pour créer 10 commentaires fictifs
        Commentaire::factory()->count(10)->create();
        \App\Models\Commentaire::factory(10)->create([
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'bien_id' => \App\Models\Bien::inRandomOrder()->first()->id,
        ]);
    }
}
