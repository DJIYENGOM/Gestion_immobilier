<?php

namespace Tests\Feature;

use App\Models\Bien;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AjoutBienTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_AjoutBien(): void
    {
        // Création d'un bien à des fins de test
        $bienData = Bien::factory()->make()->toArray();

        // Envoi de la requête POST pour ajouter un bien
        $response = $this->post(route('ajout_bien'), $bienData);

        // Vérification du code de statut HTTP 200 (OK)
        $response->assertStatus(200);

        // Vérification de la présence des biens dans la vue
        $response->assertViewHas('biens'); // Assurez-vous d'ajuster le nom de la variable selon votre implémentation

        // Vérification de la présence du bien ajouté dans la base de données
        $this->assertDatabaseHas('biens', $bienData);
    }
}

