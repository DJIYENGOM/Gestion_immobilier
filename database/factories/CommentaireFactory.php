<?php

namespace Database\Factories;

use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commentaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'bien_id' => \App\Models\Bien::factory(),
            'contenue' => $this->faker->paragraph,
            'date_publication' => $this->faker->dateTime,
        ];
    }
}
