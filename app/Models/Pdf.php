<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    protected $table ='pdfs';
    protected $guarded =['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}