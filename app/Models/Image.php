<?php

namespace App\Models;

use App\Casts\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=['listing_id','image'];

    protected $casts=[
        'image'=>UploadedFile::class.':admin,'.'sections/listings/gallery',
        'created_at'=>'datetime:d/m/Y',
    ];
}
