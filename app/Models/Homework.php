<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];
//    protected $fillable = [
//        'circle_id',
//        'circle_category_id',
//        'student_id',
//        'start_surah_number',
//        'end_surah_number',
//        'start_ayah_number',
//        'end_ayah_number',
//        'homework_date',
//        'checked',
//        'notes',
//    ];

    // Relationships
    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }

    public function circleCategory()
    {
        return $this->belongsTo(CirclesCategory::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
