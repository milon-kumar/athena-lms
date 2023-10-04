<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function studentExamQuestions()
    {
        return $this->hasMany(StudentExamQuestion::class);
    }

    public function student(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
