<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExamQuestion extends Model
{
    use HasFactory;
    protected $table = "student_exam_questions";
    protected $guarded=['id'];

    public function question()
    {
        return $this->belongsTo(ExamQuestion::class,'exam_question_id');
    }
}
