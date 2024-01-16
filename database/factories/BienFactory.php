<?php

namespace Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = UploadedFile::fake()->image('image1s.png');
        // $photoChambre = UploadedFile::fake()->image('teste.png');
        return [
            'nom' => $this->faker->randomElement(['studio ','duplex','appartement']),
            'categorie' => $this->faker->randomElement(['luxe','simple','moyen']),
            'image' => $image,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['occuper','disponible']),
            'adresse' => $this->faker->sentence,
        ];
    }
}
