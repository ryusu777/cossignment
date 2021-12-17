<?php

namespace Database\Factories;

use App\Models\TrQuiz;
use App\Models\TrQuizQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrQuizAnswerFactory extends Factory
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
            'question_id' => TrQuizQuestion::where('quiz_id', $quiz->quiz_id)->first()->question_id,
            'student_id' => $quiz->class->members->random()->id,
            'quiz_answer' => $this->faker->randomElement(array('a', 'b', 'c', 'd'))
        ];
    }
}
