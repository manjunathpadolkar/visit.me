<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonts extends Model
{
    use HasFactory;
    protected $fillable = ['font_name', 'font_family'];
}

