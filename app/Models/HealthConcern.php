<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthConcern extends Model
{
    use HasFactory;

    protected $fillable = ['heading','heading2','description','image'];
}
