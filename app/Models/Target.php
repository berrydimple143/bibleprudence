<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'option',
        'scavenger_id',
    ];

    public function scavenger(): BelongsTo
    {
        return $this->belongsTo(Scavenger::class);
    }
}
