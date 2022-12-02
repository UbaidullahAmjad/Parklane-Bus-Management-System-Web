<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['name','no_of_seat','plate_no','base_rate','image','busType_id','active'];

    public function bustype()
    {
        return $this->hasMany(busType::class,'busType_id','id');
    }
     public function bustrip()
    {
        return $this->hasMany(BusTrip::class,'bus_id','id');
    }
    
}
