<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_name' => $this->faker->word(),
            'class_code' => $this->faker->uuid(),
            'class_description' => $this->faker->sentence()
        ];
    }
}
