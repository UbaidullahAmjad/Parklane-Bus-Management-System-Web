<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'first_name',
        'last_name',
        'phone',
        'address',
        'isVerified',
        'city',
        'state',
        'dob',

        'avatar'
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
        // return $this->hasOne('App\Models\VerifyUser');
        return $this->hasOne(VerifyUser::class,'user_id','id');
    }
}
