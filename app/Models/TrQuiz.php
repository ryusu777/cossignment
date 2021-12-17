<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrQuiz extends Model
{
    use HasFactory;
    public $table = 'tr_quiz';

    public function creator()
    {
        return $this->belongsTo(TrUser::class, 'created_by');
    }

    public function class()
    {
        return $this->belongsTo(TrClass::class, 'class_id');
    }

    public function questions()
    {
        return $this->hasMany(TrQuizQuestion::class, 'quiz_id');
    }
}
