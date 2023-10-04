<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FBGroupAccessCode extends Model
{
    use HasFactory;
    protected $table='f_b_group_access_codes';
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
