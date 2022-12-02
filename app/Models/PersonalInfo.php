<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;
    protected $fillable = ['age','dob','city','state','Identity','image','user_id'];

    public function user()
    {
        $this->belongsTo(User::class,'user_id','id');
    }
}
