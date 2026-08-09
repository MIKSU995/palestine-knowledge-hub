<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'icon',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function educationalResources()
    {
        return $this->hasMany(EducationalResource::class);
    }
}