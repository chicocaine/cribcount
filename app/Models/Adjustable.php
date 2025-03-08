<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adjustable extends Model
{
    /** @use HasFactory<\Database\Factories\AdjustableFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mortgage_id',
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
