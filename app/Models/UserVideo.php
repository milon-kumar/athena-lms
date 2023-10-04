<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{
    use HasFactory;
    protected $table ="user_videos";
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
