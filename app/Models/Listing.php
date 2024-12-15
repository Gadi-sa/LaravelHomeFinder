<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'beds',
        'baths',
        'area',
        'city',
        'code',
        'street',
        'street_nr',
        'price',
    ];

    /**
     *  The owner function defines a belongsTo relationship between the Listing and User models.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'user_id'
        );
    }
}
