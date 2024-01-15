<?php

namespace Database\Factories;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => function () {
                // Créez un utilisateur aléatoire ou utilisez un existant
                return \App\Models\User::factory()->create()->id;
            },
            'nom' => $this->faker->randomElement(['studio', 'duplex', 'appartement']),
            'categorie' => $this->faker->randomElement(['luxe', 'simple', 'moyen']),
            'image' => $this->faker->imageUrl(), // Vous pouvez personnaliser cela en fonction de la logique de stockage d'image de votre application
            'description' => $this->faker->text,
            'adresse' => $this->faker->address,
            'status' => $this->faker->randomElement(['occuper', 'disponible']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
