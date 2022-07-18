<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'objet' => $this->faker->word(),
            'montant_ht' => $this->faker->numberBetween(1 , 100),
            'montant_ttc' => $this->faker->numberBetween(1 , 100),
            'type_projet' => $this->faker->word('conseil'),
            'dateosc' => $this->faker->date(),
            'delai_execution' =>$this->faker->date(),
            'etattech' => $this->faker->date(),
            'etatfin' => $this->faker->date(),
            'client_id' => 2

        ];
    }
}
