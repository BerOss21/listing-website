<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'user_id',
        'listing_id',
        'content',
        'rating',
        'approved'
    ];

    protected $casts=[
        'approved'=>'boolean',
        'created_at'=>'datetime'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function scopeActive(Builder $query)
   {
        $query->whereApproved(1);
   }
}
