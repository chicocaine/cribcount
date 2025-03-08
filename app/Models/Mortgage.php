<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mortgage extends Model
{
    /** @use HasFactory<\Database\Factories\MortgageFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'home_price',
        'down_payment',
        'loan_type',
        'interest_rate',
        'loan_term',
        'monthly_property_tax',
        'monthly_home_insurance',
        'monthly_hoa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function adjustable()
    {
        return $this->hasOne(Adjustable::class);
    }
}
