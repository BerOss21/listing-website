<?php

namespace App\Models;

use App\Enums\Days;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable=['listing_id','day','start_time','end_time','status'];

    protected $casts=[
        'day'=>Days::class,
        'status'=>'boolean',
        'created_at'=>'datetime:d/m/y'
    ];

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class)->withDefault();
    }

    public function scopeActive(Builder $builder)
    {
        $builder->whereStatus(1);
    }
}
