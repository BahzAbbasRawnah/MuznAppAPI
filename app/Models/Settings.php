<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=[];
//    protected $fillable = [
//        'name',
//        'logo_url',
//        'address',
//        'phone',
//        'email',
//        'website_url',
//        'video_server_url',
//        'support_email',
//        'social_media_links',
//    ];
}
