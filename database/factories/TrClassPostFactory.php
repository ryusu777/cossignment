<?php

namespace Database\Factories;

use App\Models\TrClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrClassPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $class = TrClass::all()->random();
        return [
            'created_by' => $class->members->random()->id,
            'class_id' => $class->class_id,
            'post_title' => $this->faker->sentence(3),
            'post_body' => $this->faker->text()
        ];
    }
}
