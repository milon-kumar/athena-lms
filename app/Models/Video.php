<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = "videos";
    protected $guarded =['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->belongsTo(CourseChapter::class,'course_chapter_id');
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function userVideoHitCount()
    {
        return $this->hasMany(UserVideo::class,'video_id')->where('user_id',auth()->id())->where('video_type','course');
    }
}
