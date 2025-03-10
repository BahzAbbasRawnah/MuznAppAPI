<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
//    protected $fillable = [
//        'teacher_id',
//        'name',
//        'type',
//        'address',
//    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function circles()
    {
        return $this->hasMany(Circle::class);
    }
}
