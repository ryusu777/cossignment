<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrAssignmentAttachment extends Model
{
    use HasFactory;
    public $table = "tr_assignment_attachment";

    public function assignment()
    {
        return $this->belongsTo(TrAssignment::class, 'assignment_id');
    }
}
