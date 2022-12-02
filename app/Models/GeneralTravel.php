<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralTravel extends Model
{
    use HasFactory;

    protected $fillable = ['heading','heading2','mission','description','mission_desc','awards','awards_desc','principles','principles_desc','history','history_desc'];
}
