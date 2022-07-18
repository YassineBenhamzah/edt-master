<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'nom' => $this->faker->firstName(),
            'prenom' => $this->faker->lastName(),
            'mail' => $this->faker->unique()->safeEmail(),

            'telephone' =>$this->faker->numerify('###-###-####'),
            'gsm' => $this->faker->numerify('###-###-####'),
            'fonction' => $this->faker->word(),
            'client_id' => 1

        ];
    }
}
