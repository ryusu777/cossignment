<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrClassPost extends Model
{
    use HasFactory;
    public $primaryKey = 'post_id';
    public $fillable = [
        'created_by',
        'class_id',
        'post_title',
        'post_body',
    ];

    public function comments() {
        return $this->hasMany(TrPostComment::class, 'post_id');
    }

    public function theClass() {
        return $this->belongsTo(TrClass::class, 'class_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
