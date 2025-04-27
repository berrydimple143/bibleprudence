<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Blog extends Model
{
    use HasFactory, HasSEO;

    protected $fillable = [
        'topic',
        'title',
        'author',
        'body',
        'image',
        'video',
        'audio',
        'status',
        'date_posted',
    ];    

    public function blog_comments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
