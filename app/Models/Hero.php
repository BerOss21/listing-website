<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\UploadedFile;

class Hero extends Model
{
    use HasFactory;

    protected $fillable=['id','title','sub_title','background'];

    protected $casts = [
        'background'=>UploadedFile::class.':admin,'.'sections'.DIRECTORY_SEPARATOR.'hero',
    ];
}
