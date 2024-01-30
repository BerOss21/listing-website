<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'claim',
        'user_id',
        'listing_id'
    ];

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
