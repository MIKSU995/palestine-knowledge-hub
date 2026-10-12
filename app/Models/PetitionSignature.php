<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitionSignature extends Model
{
    use HasFactory;

    protected $fillable = [
        'petition_id', 'name', 'email', 'city', 'country', 'message', 'ip_address'
    ];

    public function petition()
    {
        return $this->belongsTo(Petition::class);
    }
}
