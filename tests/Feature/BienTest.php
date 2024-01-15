<?php
use App\Models\Bien;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AjoutBiensTest extends TestCase
{
 

    public function testAjoutBiens()
    {
        $this->artisan('migrate');
        
        $user = User::factory()->create(); // ou récupérez un utilisateur existant
        // $this->actingAs($user);

        Storage::fake('public');
        $file = UploadedFile::fake()->image('article.jpg');
        // Créez des données de bien simulées
        $bienData = [
            'user_id' => $user->id,
            'nom' => 'studio',
            'categorie' => 'luxe',
            'image' => $file,
            'adresse' => 'Adresse',
            'description' => 'Description de test',
            'status' => 'occuper',
        ];
        // Envoi de la requête POST pour ajouter un bien
        $response = $this->actingAs($user)->post('/AjoutBien', $bienData);
        // $response->assertRedirect('/biens/liste');
        // $response->assertStatus(419);
        $response->assertRedirect('/biens/liste');
    }


    public function testlistebiens()
    {
        $this->artisan('migrate');
        $response = $this->get('/biens/listeUser');

        $response->assertStatus(200);
    }

    // public function testAjoutBien()
    // {
    //     $this->artisan('migrate');

    //     $response = $this->post('/AjoutBien');
    //     $response->assertStatus(200);
    // }
}
