<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveVideo extends Model
{
    use HasFactory;
    protected $table ='live_videos';
    protected $guarded =['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function userHitCount()
    {
        return $this->hasMany(UserVideo::class,'live_video_id')->whereNotNull('live_video_id')->whereNull('video_id')->where('user_id',auth()->id())->where('video_type','live');
    }
}
