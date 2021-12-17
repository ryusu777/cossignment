<?php

namespace Database\Factories;

use App\Models\TrAssignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrAssignmentAttachmentFactory extends Factory
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
            'file_name' => $this->faker->word,
            'file_link' => $this->faker->url
        ];
    }
}
