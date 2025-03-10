<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
//    protected $fillable = [
//        'teacher_id',
//        'user_id',
//    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function circleStudents()
    {
        return $this->hasMany(CircleStudent::class);
    }

    public function studentAttendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function studentProgress()
    {
        return $this->hasMany(StudentProgress::class);
    }
}
