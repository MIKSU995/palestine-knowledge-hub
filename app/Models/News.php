<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'source',
        'url',
        'image_url',
        'summary',
        'published_at',
        'category',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
