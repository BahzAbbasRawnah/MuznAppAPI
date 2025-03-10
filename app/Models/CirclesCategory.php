<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CirclesCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected  $table='circles_category';
    protected $guarded=[];
//    protected $fillable = [
//        'name',
//        'namevalue',
//    ];

    // Relationships
    public function circles()
    {
        return $this->hasMany(Circle::class);
    }

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
}
