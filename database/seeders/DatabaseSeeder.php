<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créez 10 utilisateurs fictifs
        \App\Models\User::factory(10)->create();

        // Créez un utilisateur de test spécifique
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Utilisez le seeder pour créer 10 commentaires fictifs
        $this->call(CommentaireSeeder::class);
    }
}
