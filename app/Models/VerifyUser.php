<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    use HasFactory;
    protected $fillable = ['token','user_id','guest_id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function guest(){
        // return $this->belongsTo('App\Guest');
        return $this->belongsTo(Guests::class,'guest_id','id');
    }
}
