<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrQuizQuestion extends Model
{
    use HasFactory;
    public $table = 'tr_quiz_question';

    public function quiz()
    {
        return $this->belongsTo(TrQuiz::class, 'quiz_id');
    }

    public function answers()
    {
        return $this->hasMany(TrQuizAnswer::class);
    }
}
