<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'school_id',
        'teacher_id',
        'name',
        'description',
        'circle_category_id',
        'circle_type',
        'circle_time',
        'jitsi_link',
        'recording_url',
    ];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function circleCategory()
    {
        return $this->belongsTo(CirclesCategory::class);
    }

    public function circleStudents()
    {
        return $this->hasMany(CircleStudent::class);
    }
}