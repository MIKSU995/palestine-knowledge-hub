<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'media_type',
        'media_url',
        'thumbnail_url',
        'caption',
        'year',
        'views',
    ];

    public function getImageUrlAttribute()
    {
        return $this->media_url ?? $this->thumbnail_url ?? 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=1000';
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
