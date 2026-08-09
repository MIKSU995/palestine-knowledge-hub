<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimelineEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'era',
        'year',
        'date_display',
        'location',
        'description',
        'details',
        'image_url',
        'impact_level',
        'is_key_event',
    ];

    protected $casts = [
        'is_key_event' => 'boolean',
        'year' => 'integer',
    ];
}
