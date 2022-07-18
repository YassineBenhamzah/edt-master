<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appeloffres>
 */
class AppeloffresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'objet' => $this->faker->text(),
            'date_ouv' => $this->faker->date(),
            'typesoumission' =>$this->faker->numerify(),
            'client_id' => 2
        ];
    }
}
