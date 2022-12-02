<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = ['social_link1','social_link2','social_link3','social_link4','social_description1','social_description2','social_description3','social_description4','heading','social_title'];
}
