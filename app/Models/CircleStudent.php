<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CircleStudent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'circle_id',
        'student_id',
        'teacher_id',
    ];

    // Relationships
    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}