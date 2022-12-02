<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busType extends Model
{
    use HasFactory;
    protected $fillable = ['name','active'];

    public function buses()
    {
        return $this->hasMany(Bus::class,'busType_id','id');
    }
}
