<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['id','booking_no','seat_no','user_id','guest_id','booking_date','bustrip_id','status','confirmation_code','active'];

     public function user()
     {
         return $this->belongsTo(User::class,'user_id','id');

     }

     public function guest()
     {
         return $this->belongsTo(Guests::class,'guest_id','id');

     }

     public function bustrip()
     {
         return $this->belongsTo(BusTrip::class,'bustrip_id','id');
     }

}
