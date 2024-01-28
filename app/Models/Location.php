<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, Sluggable;

    protected $fillable=[
        'name',
        'show_at_home',
        'status'
    ];

    protected $casts=[
        'created_at'=>'datetime:d/m/Y',
        'show_at_home' => 'boolean',
        'status' => 'boolean',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function listings() :HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function approved_listings() :HasMany
    {
        return $this->listings()->active()->approved();
    }

    
    public function scopeActive(Builder $query)
    {
        $query->whereStatus(1);
    }

    public function scopeShowAtHome(Builder $query)
    {
        $query->whereShowAtHome(1);
    }
}
