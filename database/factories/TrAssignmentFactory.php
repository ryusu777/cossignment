<?php

namespace Database\Factories;

use App\Models\TrClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrAssignmentFactory extends Factory
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
            'created_by' => $class->user->id,
            'class_id' => $class->class_id,
            'assignment_title' => $this->faker->sentence(3),
            'assignment_description' => $this->faker->text(),
            'assignment_due' => $this->faker->dateTime()
        ];
    }
}
