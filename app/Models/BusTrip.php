<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class BusTrip extends Model
{
    use HasFactory,Rateable;
    protected $fillable = ['pickup_location','drop_off_location','pickup_date','pickup_time','drop_off_date','drop_off_time','bus_id','left_seat','created_at','updated_at'];

    public function bus()
    {
       return $this->belongsTo(Bus::class,'bus_id','id');
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class,'bustrip_id','id');
    }
}
