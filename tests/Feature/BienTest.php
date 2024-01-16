<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Bien;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BienTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testObtenirListeDesBiens()
    // {
    //     $user = User::factory()->create();
    //     $this->actingAs($user);
    //     // Créer des articles fictifs dans la base de données
    //     Bien::factory()->create(['user_id' => $user->id]);

    //     $response = $this->get('/biens/listeUser');
    //     $response->assertViewIs('liste.index');


    //     $response->assertStatus(200);
    //          // Assurez-vous que la réponse contient une liste de 5 biens
    // }
   
    public function testlistebiens()
    {
        $this->artisan('migrate');
        $response = $this->get('/biens/listeUser');

        $response->assertStatus(200);
    }

    public function test_creer_bien()
{
    // Créer un utilisateur avec la factory User
    $user = User::factory()->create();
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
        'role' => 'admin',
    ]);

    Storage::fake('public');
    $file = UploadedFile::fake()->image('article.jpg');

    // Données nécessaires pour créer un bien
    $donneesBien = [
        'nom' => 'studio',
        'categorie' => 'luxe',
        'image' => $file, // Utilisez le fichier simulé directement
        'description' => 'Description du bien',
        'adresse' => 'Adresse du bien',
        'status' => 'occuper',
        // Utiliser l'ID de l'utilisateur créé avec la factory
        'user_id' => $user->id,
    ];

    // Effectuer la requête POST pour créer un bien
    $response = $this->post('/AjoutBien', $donneesBien);

    // Vérifier que la création a réussi (statut HTTP 201 Created)
    // $response->assertStatus(201);

    // Ajouter des assertions supplémentaires si nécessaire
    // Par exemple, vérifier que le bien a été réellement créé en base de données
    $response->assertRedirect('/biens/liste');
}

}
