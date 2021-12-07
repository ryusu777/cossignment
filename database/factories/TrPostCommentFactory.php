<?php

namespace Database\Factories;

use App\Models\TrClass;
use App\Models\TrClassPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrPostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $post = TrClassPost::all()->random();
        return [
            'user_id' => $post->theClass->members->random()->id,
            'post_id' => $post->post_id,
            'comment_body' => $this->faker->sentence()
        ];
    }
}
