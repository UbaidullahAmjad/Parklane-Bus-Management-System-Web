<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsUpdates extends Model
{
    use HasFactory;

    protected $fillable = ['image','heading','heading1' ,'title','descripton','title2','descripton2','title3','descripton3','created_at'];
}
