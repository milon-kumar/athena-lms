<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetails extends Model
{
    use HasFactory;
    protected $table = "course_details";
    protected $guarded = ['id'];

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
