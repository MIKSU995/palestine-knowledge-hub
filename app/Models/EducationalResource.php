<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'category_id',
        'description',
        'file_path',
        'external_url',
        'author',
        'downloads_count',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }
}
