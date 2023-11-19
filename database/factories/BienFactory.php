<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Bien;
use Illuminate\Database\Eloquent\Factories\Factory; // Importez la classe Factory
use Illuminate\Support\Str;

class BienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'nom' => $this->faker->randomElement(['studio', 'duplex', 'appartement']), // Utilisez $this->faker
            'categorie' => $this->faker->randomElement(['luxe', 'simple', 'moyen']), // Utilisez $this->faker
            'image' => $this->faker->imageUrl(), // Utilisez $this->faker
            'description' => $this->faker->paragraph, // Utilisez $this->faker
            'adresse' => $this->faker->address, // Utilisez $this->faker
            'status' => $this->faker->randomElement(['occuper', 'disponible']), // Utilisez $this->faker
            'date_enregistrement' => $this->faker->dateTime, // Utilisez $this->faker
        ];
    }
}
