<?php

namespace Database\Seeders;

use App\Models\TrAssignment;
use App\Models\TrAssignmentAttachment;
use App\Models\TrAssignmentTurnIn;
use App\Models\TrClass;
use App\Models\TrClassPost;
use App\Models\TrPostComment;
use App\Models\TrQuiz;
use App\Models\TrQuizAnswer;
use App\Models\TrQuizQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User with role 'teacher'
        $teachers = User::factory(3)->create([
            'role' => 'teacher'
        ]);

        // Create class for random teacher
        $classes = collect(TrClass::factory()->count(1)->for($teachers->random())->create());
        for ($i = 0; $i < 4; $i++) 
            $classes->push(TrClass::factory()->count(1)->for($teachers->random())->create());

        // Create class members
        User::factory(30)->
            create(['role' => 'student'])->each(function ($user) use ($classes){
                $randomClass = $classes->random(4);
                foreach ($randomClass as $class) {
                    $user->classes()->attach($class);
                }
            });
        
        // Create random class posts
        TrClassPost::factory(20)->create();

        // Create random post comments
        TrPostComment::factory(30)->create();

        // Assignments seeding
        TrAssignment::factory(30)->create();
        TrAssignmentAttachment::factory(10)->create();
        TrAssignmentTurnIn::factory(50)->create();

        // Quiz seeding
        TrQuiz::factory(5)->create();
        TrQuizQuestion::factory(30)->create();
        TrQuizAnswer::factory(20)->create();
    }
}
