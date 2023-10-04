<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    use HasFactory;

    protected $table = "course_chapters";
    protected $guarded =['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class);
    }
}
