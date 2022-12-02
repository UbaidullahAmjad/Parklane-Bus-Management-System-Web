<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'first_name',
        'last_name',
        'phone',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class,'bustrip_id','id');
    }
    public function userinfo()
    {
        $this->belongsTo(PersonalInfo::class,'user_id','id');
    }

    public function verifyUser(){
        return $this->hasOne(VerifyUser::class,'guest_id','id');
    }
}
