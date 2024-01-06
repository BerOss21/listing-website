<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable=['listing_id','image','url'];

    protected $casts=[
        'created_at'=>'datetime:d/m/Y',
    ];
}
