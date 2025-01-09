<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'author',
        'robots',
        'url',
        'page',
        'keywords',
        'application_name',
        'generator',
    ];
}
