<?php

namespace App\Models;

use App\Enums\Days;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable=['listing_id','day','start_time','end_time'];

    protected $casts=[
        'day'=>Days::class,
        'created_at'=>'datetime:d/m/y'
    ];

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class)->withDefault();
    }
}
