<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bmath extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'verses',
        'level',
        'status',
        'formula',
    ];
    
    public function options(): HasMany
    {
        return $this->hasMany(MathOption::class);
    }    
}
