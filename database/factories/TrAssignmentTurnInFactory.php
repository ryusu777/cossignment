<?php

namespace Database\Factories;

use App\Models\TrAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrAssignmentTurnInFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $assignment = TrAssignment::all()->random();
        return [
            'assignment_id' => $assignment->assignment_id,
            'student_id' => $assignment->class->members->random()->id,
            'body' => $this->faker->sentence(),
            'file_link' => $this->faker->url,
            'file_name' => $this->faker->word
        ];
    }
}
