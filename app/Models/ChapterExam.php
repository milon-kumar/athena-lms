<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterExam extends Model
{
    use HasFactory;
    protected $table = "chapter_exams";
    protected $guarded =['id'];
}
