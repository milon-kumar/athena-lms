<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrole extends Model
{
    use HasFactory;
    protected $table ='enroles';
    protected $guarded =['id'];

//    public function users()
//    {
//        return $this->belongsToMany(User::class,'enrole_user','user_id','enrole_id');
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


//    public function enrolledUsers()
//    {
//        return $this->belongsToMany(User::class, 'enroles')->withPivot('unique_id');
//    }

}
