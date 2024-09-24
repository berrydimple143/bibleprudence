<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outline extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'support_text',
        'theme',
        'introduction',
        'keyword',
        'proposition',
        'conclusion',
        'topic_id',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }
}
