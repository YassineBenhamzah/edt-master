<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Caution>
 */
class CautionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'montant' => $this->faker->name(),
            'typecaution' => $this->faker->name(),
            'datedebit' => $this->faker->date(),
            'bqdebit' => now(),
            'refchq' =>$this->faker->numerify('###-###-####'),
            'dateconstitution' => $this->faker->date(),
            'daterestitution' => $this->faker->date(),
            'datecredit' => $this->faker->date(),
            'bqcredit' => $this->faker->name(),
            'moycredit' => $this->faker->numberBetween(6,12),
            'refcredit' => $this->faker->name(),
            'etat' => $this->faker->word(),
            'appeloffres_id' => 1 ,
            'projet_id' => 4

        ];
    }
}
