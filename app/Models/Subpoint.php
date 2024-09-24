<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub',
        'verse',
        'body',
        'point_id',
    ];

    public function point(): BelongsTo
    {
        return $this->belongsTo(Point::class);
    }
}
