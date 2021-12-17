<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrQuizAnswer extends Model
{
    use HasFactory;
    public $table = 'tr_quiz_answer';

    public function question()
    {
        return $this->belongsTo(TrQuizQuestion::class, 'question_id');
    }

    public function student()
    {
        return $this->belongsTo(TrUser::class, 'student_id');
    }
}
