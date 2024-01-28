<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable=['listing_id','image','url'];

    protected $casts=[
        'created_at'=>'datetime:d/m/Y',
    ];

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
