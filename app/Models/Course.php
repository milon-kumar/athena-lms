<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $guarded=['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function courseDetails()
    {
        return $this->hasOne(CourseDetails::class);
    }

    public function chapters()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class);
    }

    public function enrole()
    {
        return $this->belongsTo(Enrole::class);
    }

    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enroles')->withPivot('unique_id','is_suspend','is_post_approval');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function courseFeatureds(){
        return $this->hasMany(CourseFeture::class);
    }

    public function studentExam()
    {
        return $this->hasMany(StudentExam::class);
    }

    public function userVideos()
    {
        return $this->hasMany(UserVideo::class,'course_id');
    }


}
