<?php

namespace Database\Factories;

use App\Models\TrClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrQuizFactory extends Factory
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
            'class_id' => $class->class_id,
            'created_by' => $class->user->id,
            'quiz_title' => $this->faker->word(),
            'quiz_due' => $this->faker->dateTime(),
            'quiz_duration' => $this->faker->time(),
            'quiz_description' => $this->faker->sentence()
        ];
    }
}
