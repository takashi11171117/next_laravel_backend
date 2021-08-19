<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail_path',
        'vimeo_video_id', 
        'teacher_id'
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
