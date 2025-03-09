<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAttendance extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
    protected $table='student_attendance';
//    protected $fillable = [
//        'student_id',
//        'circle_id',
//        'attendance_date',
//        'status',
//    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }
}
