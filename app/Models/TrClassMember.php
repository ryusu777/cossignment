<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrClassMember extends Model
{
    use HasFactory;

    public $fillable = [
        'class_id',
        'user_id'
    ];
}
