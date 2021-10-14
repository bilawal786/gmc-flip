<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flip extends Model
{
    protected $fillable = ['name', 'pdf', 'slug', 'color', 'image', 'link'];
}
