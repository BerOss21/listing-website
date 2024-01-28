<?php

namespace App\Models;

use App\Casts\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable=['listing_id','image'];

    protected $casts=[
        'image'=>UploadedFile::class.':admin,'.'sections/listings/gallery',
        'created_at'=>'datetime:d/m/Y',
    ];

    public function listing() :BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
