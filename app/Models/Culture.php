<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'arabic_title', 'category', 'description',
        'content', 'image_url', 'region', 'is_featured', 'sort_order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
