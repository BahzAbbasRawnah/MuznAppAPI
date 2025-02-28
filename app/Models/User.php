<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone',
        'country',
        'gender',
        'role',
        'status',
    ];

    // Relationships
    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
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

    public function digitalLibraries()
    {
        return $this->hasMany(DigitalLibrary::class);
    }
}