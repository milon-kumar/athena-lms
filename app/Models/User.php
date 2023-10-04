<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table='users';


    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chourseChapters()
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function examTypes()
    {
        return $this->hasMany(ExamType::class);
    }

    public function exams()
    {
        return $this->hasMany(ChapterExam::class);
    }

    public function enroles()
    {
        return $this->belongsToMany(Enrole::class, 'course')->withPivot('unique_id');
    }

    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enroles')->withPivot('unique_id', 'status', 'payment_id', 'date');
    }


    public function approvedCourses()
    {
        return $this->belongsToMany(Course::class, 'enroles')->wherePivot('status','approve')->withPivot('unique_id', 'status', 'payment_id', 'date','is_suspend','is_post_approval');
    }
}
