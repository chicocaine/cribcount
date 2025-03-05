<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjustable extends Model
{
    /** @use HasFactory<\Database\Factories\AdjustableFactory> */
    use HasFactory;

    protected $fillable = [
        'initial_term',
        'initial_rate',
        'margin',
        'periodic_cap',
        'lifetime_cap',
        'interest_only_period',
    ];

    public function mortgage()
    {
        return $this->belongsTo(Mortgage::class);
    }
    
}
