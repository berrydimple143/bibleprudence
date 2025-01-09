<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'limit',
	'app',
	'items',
    ];
}
