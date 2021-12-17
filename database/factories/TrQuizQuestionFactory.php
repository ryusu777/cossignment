<?php

namespace Database\Factories;

use App\Models\TrQuiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrQuizQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quiz = TrQuiz::all()->random();
        return [
            'quiz_id' => $quiz->quiz_id,
            'question_body' => $this->faker->sentence(),
            'question_choices' => $this->faker->sentence(),
            'correct_answer' => $this->faker->randomElement(array('a', 'b', 'c', 'd')),
        ];
    }
}
