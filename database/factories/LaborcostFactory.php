<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\laborcost>
 */
class LaborcostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'startingdate' =>$this->faker->date(),
            'finaldate' => $this->faker->date(),
            'cost' => $this->faker->numberBetween(100 , 1000),
            'isarchived' => $this->faker->boolean(),
            'user_id' => 1

        ];
    }
}
