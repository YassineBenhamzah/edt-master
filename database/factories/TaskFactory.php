<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'datedebut' => $this->faker->date(),
            'datefin' => $this->faker->date(),
            'nombre_heure' => $this->faker->time(),
            'projet_id' => 7,
            'user_id' => 7

        ];
    }
}
