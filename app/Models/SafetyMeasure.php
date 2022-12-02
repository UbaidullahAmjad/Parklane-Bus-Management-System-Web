<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyMeasure extends Model
{
    use HasFactory;

    protected $fillable = ['heading','heading2','image','description'];
}
