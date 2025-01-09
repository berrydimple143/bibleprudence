<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scavenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'verse',
        'status',
    ];

    public function targets(): HasMany
    {
        return $this->hasMany(Target::class);
    }
}
