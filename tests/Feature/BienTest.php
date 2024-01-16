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
    $user = User::factory()->create();
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
        'role' => 'admin',
    ]);

    Storage::fake('public');
    $file = UploadedFile::fake()->image('article.jpg');

    $donneesBien = [
        'nom' => 'studio',
        'categorie' => 'luxe',
        'image' => $file,
        'description' => 'Description du bien',
        'adresse' => 'Adresse du bien',
        'status' => 'occuper',
        'user_id' => $user->id,
    ];
    $response = $this->post('/AjoutBien', $donneesBien);
    $response->assertRedirect('/biens/liste');
}
public function testSupprimerBien()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'role' => 'admin',
        ]);
    
        Storage::fake('public');
        $file = UploadedFile::fake()->image('article.jpg');
    
        $donneesBien = Bien::factory([
            'nom' => 'studio',
            'categorie' => 'luxe',
            'image' => $file,
            'description' => 'Description du bien',
            'adresse' => 'Adresse du bien',
            'status' => 'occuper',
            'user_id' => $user->id,
        ])->create();

        // $this->delete('/supprimerbien/' . $donneesBien->id);

        // $this->assertNull(Bien::find($donneesBien->id));

        $this->get('/supprimerbien/' . $donneesBien->id);
        // dd(Bien::find($donneesBien->id)); // Vérifiez si l'enregistrement est toujours présent
        $this->assertDatabaseMissing('biens', ['id' => $donneesBien->id]);
        

    }

}
