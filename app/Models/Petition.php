<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'content', 'target_signatures',
        'signature_count', 'is_active', 'external_link'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function signatures()
    {
        return $this->hasMany(PetitionSignature::class);
    }

    public function getProgressPercentAttribute(): int
    {
        $target = (int) $this->target_signatures;
        if ($target === 0) return 0;
        return min(100, (int) round(($this->signature_count / $target) * 100));
    }
}
