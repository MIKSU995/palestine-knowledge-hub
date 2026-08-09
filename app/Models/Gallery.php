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

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
