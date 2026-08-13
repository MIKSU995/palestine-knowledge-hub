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
        $url = $this->media_url ?? $this->thumbnail_url;
        if (!$url) {
            return asset('images/cities/jerusalem.jpg');
        }
        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return $url;
        }
        if (str_starts_with($url, 'images/')) {
            return asset($url);
        }
        return asset('storage/' . $url);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
