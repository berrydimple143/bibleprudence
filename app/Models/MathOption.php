<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MathOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option',
        'bmath_id',
    ];

    public function bmath(): BelongsTo
    {
        return $this->belongsTo(Bmath::class);
    }
}
