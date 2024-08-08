<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'kwh_today',
        'kwh_last',
        'tl',
        'kvarh',
        'voltA',
        'voltB',
        'voltC',
        'currA',
        'currB',
        'currC',
        'freq',
    ];
}
