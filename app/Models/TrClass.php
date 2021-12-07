<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrClass extends Model
{
    use HasFactory;
    public $primaryKey = 'class_id';

    public function posts() {
        return $this->hasMany(TrClassPost::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function members() {
        return $this->belongsToMany(User::class, 'tr_class_members', 'class_id', 'user_id');
    }
}
