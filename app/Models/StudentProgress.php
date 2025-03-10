<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentProgress extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
//    protected $fillable = [
//        'homework_id',
//        'student_id',
//        'reading_rating',
//        'review_rating',
//        'telawah_rating',
//        'reading_wrong',
//        'tajweed_wrong',
//        'tashqeel_wrong',
//    ];

    // Relationships
    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
