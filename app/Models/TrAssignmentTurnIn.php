<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrAssignmentTurnIn extends Model
{
    use HasFactory;
    public $table = "tr_assignment_turn_in";

    public function student()
    {
        return $this->belongsTo(TrUser::class, 'student_id');
    }

    public function assignment()
    {
        return $this->belongsTo(TrAssignment::class, 'assignment_id');
    }
}
