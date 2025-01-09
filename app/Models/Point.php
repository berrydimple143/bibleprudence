<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'main',    
        'verse', 
        'outline_id',
    ];

    public function outline(): BelongsTo
    {
        return $this->belongsTo(Outline::class);
    }

    public function subpoints(): HasMany
    {
        return $this->hasMany(Subpoint::class);
    }
}
