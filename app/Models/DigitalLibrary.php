<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DigitalLibrary extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
//    protected $fillable = [
//        'title',
//        'author',
//        'category',
//        'file_url',
//        'teacher_id',
//    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
