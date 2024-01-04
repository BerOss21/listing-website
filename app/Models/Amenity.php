<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amenity extends Model
{
    use HasFactory, Sluggable;

    protected $fillable=[
        'name',
        'icon',
        'show_at_home',
        'status'
    ];

    protected $casts=[
        'created_at'=>'datetime:d/m/Y',
        'show_at_home' => 'boolean',
        'status' => 'boolean'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
