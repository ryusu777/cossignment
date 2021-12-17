<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrAssignment extends Model
{
    use HasFactory;
    public $table = "tr_assignment";

    public function creator() 
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function class()
    {
        return $this->belongsTo(TrClass::class, 'class_id');
    }

    public function turnIns()
    {
        return $this->hasMany(TrAssignmentTurnIn::class);
    }

    public function attachments()
    {
        return $this->hasMany(TrAssignmentAttachment::class);
    }
}
