<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Quiz extends Model
{
    use HasFactory, HasSEO;

    protected $fillable = [
        'question',
        'answer',
        'verse',
        'level',
        'topic_id',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function selections(): HasMany
    {
        return $this->hasMany(Selection::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
